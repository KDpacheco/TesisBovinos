<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Http\Requests\AnimalFormRequest2;
use App\Http\Requests\AnimalFormRequest;
use App\Http\Requests\RazaFormRequest;
use App\Raza;
use DateTime;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class AnimalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $animales = Animal::join('categoria', 'animal.animal_categoria', '=', 'categoria.categoria_id')
                    ->join('raza', 'animal.animal_raza', '=', 'raza.raza_id')
                    ->join('produccion', 'animal.animal_produccion', '=', 'produccion.produccion_id')
                    ->join('estados', 'animal.animal_estado', '=', 'estados.estados_id')
                    ->where('animal_estado', '!=', 2)
                    ->where('animal_estado', '!=', 3)
                    ->where('animal_id','!=',"inseminación")
                    ->whereBetween('animal_nacimiento', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $animales = Animal::join('categoria', 'animal.animal_categoria', '=', 'categoria.categoria_id')
                    ->join('raza', 'animal.animal_raza', '=', 'raza.raza_id')
                    ->join('produccion', 'animal.animal_produccion', '=', 'produccion.produccion_id')
                    ->join('estados', 'animal.animal_estado', '=', 'estados.estados_id')
                    ->where('animal_estado', '!=', 2)
                    ->where('animal_estado', '!=', 3)
                    ->where('animal_id','!=',"inseminación")
                    ->get();
            }
            return datatables()
                ->of($animales)
                ->addColumn('btn', function ($user) {
                    if ($user->animal_sexo == "Macho") {
                        return '<a href="' . route('animal.individualm', $user->animal_id) . '">
                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Informe Individual del animal"><i class="mdi mdi-file-pdf"></i>
                    </button></a>
                    <a href="'.route('animal.edit',$user->animal_id).'">
                    <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>
                    ';
                    } else {
                        return '<a href="' . route('animal.individualh', $user->animal_id) . '">
                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Informe Individual del animal"><i class="mdi mdi-file-pdf"></i>
                    </button></a>
                    <a href="' . route('animal.edit', $user->animal_id) . '">
                    <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>
                    ';}

                })
                ->addColumn('fecha', function ($fecha) {
                    return $fecha->animal_nacimiento->toDateString();
                })
                ->addColumn('abierto', function ($abierto) {
                    if ($abierto->animal_abierto == true) {
                        return 'Si';
                    } else {
                        return 'No';
                    }
                })
                ->rawColumns(['btn', 'fecha', 'abierto'])
                ->make(true);
        }

        return view('animal.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $razas = DB::table('raza')->get();

        return view("animal.create", ["razas" => $razas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalFormRequest $request, RazaFormRequest $rrquest)
    {
        $animales = new Animal;

        $animales->animal_madre = $request->get('animal_madre');
        $animales->animal_padre = $request->get('animal_padre');
        $animales->animal_color = $request->get('color');
        $animales->animal_peso = $request->get('peso');
        $animales->codigo_bien=$request->get('código');
        $animales->animal_arete=$request->get('arete');
        if ($request->get('raza') == "other") {
            $razas = new Raza;
            $razas->raza_nombre = $rrquest->get('nueva_raza');
            $razas->acr = strtoupper($rrquest->get('acr'));
            $razas->save();
            $raza2 = DB::table('raza')->get()->last();
            $animales->animal_raza = $raza2->raza_id;
            $id = IdGenerator::generate(['table' => 'animal', 'field' => 'animal_id', 'length' => 7, 'prefix' => $raza2->acr, 'reset_on_prefix_change' => true]);
            $animales->animal_id = $id;
        } else {
            $raza3 = Raza::findorFail($request->get('raza'));
            $id = IdGenerator::generate(['table' => 'animal', 'field' => 'animal_id', 'length' => 7, 'prefix' => $raza3->acr, 'reset_on_prefix_change' => true]);
            $animales->animal_raza = $request->get('raza');
            $animales->animal_id = $id;
        }

//output: INV-000001

        $animales->animal_sexo = $request->get('sexo');
        $animales->animal_categoria = $this->calcategoria($request->get('sexo'), $request->get('nacimiento'), $request->get('nivel'));
        $animales->animal_nacimiento = $request->get('nacimiento');
        $animales->animal_imagen = $request->get('animal_imagen');
        $animales->animal_estado = 1;
        $animales->animal_produccion = 1;
        $animales->animal_abierto = false;
        $animales->save();
        return redirect('animal');
    }


    public function edit($id)
    {
        $razas = DB::table('raza')->get();
        return view("animal.edit", ["animal" => Animal::findOrFail($id), "razas" => $razas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalFormRequest2 $request, RazaFormRequest $rrquest, $id)
    {

        $animales = Animal::findOrFail($id);
        if ($animales->codigo_bien == $request->get('código')) {
            $animales->codigo_bien= $request->get('código');
        } else {
            $prueba = Animal::where('codigo_bien', '=', $request->get('código'))->exists();
            if ($prueba) {
                $errors = new MessageBag();
                $errors->add('codigo_bien', 'codigo ya esta en uso');
                $razas = DB::table('raza')->get();
                return back()->withErrors($errors);
            } else {
                $animales->codigo_bien = $request->get('código');
            }
        }
        if ($animales->animal_arete == $request->get('arete')) {
            $animales->animal_arete= $request->get('arete');
        } else {
            $prueba = Animal::where('animal_arete', '=', $request->get('arete'))->exists();
            if ($prueba) {
                $errors = new MessageBag();
                $errors->add('arete', 'numero de arete ya esta en uso');
                $razas = DB::table('raza')->get();
                return back()->withErrors($errors);
            } else {
                $animales->animal_arete = $request->get('arete');
            }
        }
        $animales->animal_madre = $request->get('animal_madre');
        $animales->animal_padre = $request->get('animal_padre');
        $animales->animal_color = $request->get('color');
        $animales->animal_peso = $request->get('peso');
        if ($request->get('raza') == "other") {
            $razas = new Raza;
            $razas->raza_nombre = $rrquest->get('nueva_raza');
            $razas->acr = strtoupper($rrquest->get('acr'));
            $razas->save();
            $raza2 = DB::table('raza')->get()->last();
            $animales->animal_raza = $raza2->raza_id;
            $id2 = IdGenerator::generate(['table' => 'animal', 'field' => 'animal_id', 'length' => 7, 'prefix' => $raza2->acr, 'reset_on_prefix_change' => true]);
            $animales->animal_id = $id2;
        } else {
            $raza3 = Raza::findorFail($request->get('raza'));
            if($animales->animal_raza==$request->get('raza'))
            {
                $animales->animal_raza = $request->get('raza');
            }
            else{
            $id2 = IdGenerator::generate(['table' => 'animal', 'field' => 'animal_id', 'length' => 7, 'prefix' => $raza3->acr, 'reset_on_prefix_change' => true]);
            $animales->animal_raza = $request->get('raza');
            $animales->animal_id = $id2;
        }
           
        }
        $animales->animal_sexo = $request->get('sexo');
        $animales->animal_categoria = $this->calcategoria($request->get('sexo'), $request->get('nacimiento'), $request->get('nivel'));
        $animales->animal_nacimiento = $request->get('nacimiento');
        $animales->animal_imagen = $request->get('animal_imagen');
        $animales->animal_estado = 1;

        $animales->update();
        return redirect('animal');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Animal::findOrFail($id);
        $delete->delete();
        return redirect('animal');
    }

    protected function calcategoria($sexo, $fecha, $cat)
    {
        $date1 = new DateTime($fecha);
        $date2 = new DateTime("now");
        $diff = $date1->diff($date2);
        if ($diff->days <= 210) {
            return 1;
        } else {

            if ($sexo == "Hembra") {
                if ($cat == 1) {
                    return 5;
                } else {
                    return 3;
                }

            } else {
                if ($cat == 1) {
                    return 4;
                } else {
                    return 2;
                }

            }
        }

    }
}
