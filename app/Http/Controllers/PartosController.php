<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Raza;
use App\Embarazo;
use App\Http\Requests\AnimalFormRequest;
use App\Http\Requests\PartosFormRequest;
use App\Http\Requests\RazaFormRequest;
use App\Partos;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PartosController extends Controller
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
        if(request()->ajax())
        {
            if(!empty($request->from_date)){
                $partos=Partos::whereBetween('partos_fecha', array($request->from_date, $request->to_date))->get();
            }
            else{
                $partos=Partos::get();
            }
            return datatables()->of($partos)
        ->addColumn('pdf', function ($pdf) {
            return '<a href="' . route('partos.individual', $pdf->partos_id) . '">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
            </button></a>
            <a href="' . route('partos.edit', $pdf->partos_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
        }
        )
        ->rawColumns(['pdf'])
        ->make(true);
        }
        return view('partos.index');

    }

    
    public function create($id)
    {
        $razas = DB::table('raza')->get();
        return view("partos.create", ["embarazos" => Embarazo::findOrFail($id), "razas" => $razas]);
    }
    public function edit($id)
    {
        $data = Partos::join('embarazos', 'embarazos.embarazos_id', '=', 'partos.embarazo_id')
            ->select('partos.*', 'embarazos.embarazos_id', 'embarazos.fecha_aproximada')
            ->where('partos.partos_id', '=', $id)->first();
        return view("partos.edit", ["parto" => $data]);
    }
    public function store(AnimalFormRequest $request, RazaFormRequest $request2, PartosFormRequest $request3)
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
            $razas->raza_nombre = $request2->get('nueva_raza');
            $razas->acr=strtoupper($request2->get('acr'));
            $razas->save();
            $raza2 = DB::table('raza')->get()->last();
            $animales->animal_raza = $raza2->raza_id;
            $id = IdGenerator::generate(['table' => 'animal','field'=>'animal_id', 'length' => 7, 'prefix' =>$raza2->acr, 'reset_on_prefix_change'=>true]);
            $animales->animal_id = $id;
        } else {
            $raza3=Raza::findorFail($request->get('raza'));
            $id = IdGenerator::generate(['table' => 'animal','field'=>'animal_id', 'length' => 7, 'prefix' =>$raza3->acr,'reset_on_prefix_change'=>true]);
            $animales->animal_raza=$request->get('raza');
            $animales->animal_id = $id;
        }
        $animales->animal_sexo = $request->get('sexo');
        $animales->animal_categoria = 1;
        $animales->animal_nacimiento = $request->get('nacimiento');
        $animales->animal_imagen = $request->get('animal_imagen');
        $animales->animal_estado = 1;
        $animales->animal_abierto = false;
        $animales->animal_produccion = 1;
        $animales->save();

        $partos = new Partos;
        $partos->partos_madre = $request3->get('animal_madre');
        $partos->hijo_id = $id;
        $partos->partos_fecha = $request3->get('nacimiento');
        $partos->partos_complicaciones = $request3->get('complicaciones');
        $partos->partos_descripción = $request3->get('descripción');
        $partos->embarazo_id = $request3->get('embarazo_id');
        $partos->save();

        $madre = Animal::findOrFail($request->get('animal_madre'));
        $madre->animal_estado = 1;
        $madre->animal_produccion = 2;
        $madre->animal_categoria = 5;
        $madre->animal_abierto = true;
        $madre->update();
        $embarazo = Embarazo::findOrFail($request->embarazo_id);
        $embarazo->embarazo_activo = false;
        $embarazo->update();
        return redirect('partos');
    }
    public function destroy($id)
    {
        $delete = Partos::findOrFail($id);
        $delete->delete();
        return redirect('partos');
    }

    public function update(PartosFormRequest $request3, $id1)
    {

        $partos = Partos::findOrFail($id1);
        $animales=Animal::findOrFail($partos->hijo_id);
        $animales->animal_nacimiento=$request3->get('nacimiento');
        $animales->update();
        $partos->partos_fecha = $request3->get('nacimiento');
        $partos->partos_complicaciones = $request3->get('complicaciones');
        $partos->partos_descripción = $request3->get('descripción');
        $partos->embarazo_id = $request3->get('embarazo_id');
        $partos->update();
        return redirect('partos');
    }
}
