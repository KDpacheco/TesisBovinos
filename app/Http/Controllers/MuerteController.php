<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Http\Requests\MuerteFormRequest;
use App\Muertes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MuerteController extends Controller
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
            if(!empty($request->from_date))
            {
                $muerte = Muertes::join('animal', 'animal.animal_id', '=', 'registro_muertes.animal_id')
                ->select('registro_muertes.*', 'animal.animal_sexo')->whereBetween('registro_muertes_fecha', array($request->from_date, $request->to_date))
                ->get();
    
            }
            else
            {
                $muerte = Muertes::join('animal', 'animal.animal_id', '=', 'registro_muertes.animal_id')
            ->select('registro_muertes.*', 'animal.animal_sexo')
            ->get();
            }
            return datatables()
            ->of($muerte)
            ->addColumn('btn', function ($user) {
                if ($user->animal_sexo == "Macho") {
                    return '<a href="' . route('animal.individualm', $user->animal_id) . '">
                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Informe Individual del animal"><i class="mdi mdi-file-pdf"></i>
                    </button></a>';
                } else {
                    return '<a href="' . route('animal.individualh', $user->animal_id) . '">
                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Informe Individual del animal"><i class="mdi mdi-file-pdf"></i>
                    </button></a>';}
            })
            ->addColumn('pdf', function($pdf){
                return '<a href="' . route('muerte.individual', $pdf->registro_muertes_id) . '">
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
                </button></a>
                <a href="' . route('muertes.edit', $pdf->registro_muertes_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
            })
            ->rawColumns(['btn','pdf'])
            ->make(true);
        }

        return view('muertes.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales = Animal::where('animal_estado', '<', 2)->where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
        return view('muertes.create', ["animales" => $animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuerteFormRequest $request)
    {
        $muertes = new Muertes;
        $animal = Animal::findOrFail($request->get('animal'));
        $muertes->animal_id = $request->get('animal');
        $muertes->registro_muertes_fecha = $request->get('fecha');
        $muertes->registro_muertes_causa = $request->get('causa');
        $muertes->estado_anterior=$animal->animal_estado;
        $muertes->save();
        $animal = Animal::findOrFail($request->get('animal'));
        $animal->animal_estado = 2;
        $animal->update();
        return redirect('muertes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animales = Animal::where('animal_estado', '<', 2)->Where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
        return view('muertes.edit', ["animales" => $animales,"muerte"=>Muertes::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuerteFormRequest $request, $id)
    {
        $muertes = Muertes::findOrFail($id);
        $animal = Animal::findOrFail($request->get('animal'));
        
        if($muertes->animal_id!=$animal->animal_id)
        {
            $animal2=Animal::findOrFail($muertes->animal_id);
            $animal2->animal_estado=$muertes->estado_anterior;
            $animal2->update();
        }
        $muertes->animal_id = $request->get('animal');
        $muertes->registro_muertes_fecha = $request->get('fecha');
        $muertes->registro_muertes_causa = $request->get('causa');
        $muertes->update();
       
        $animal->animal_estado = 2;
        $animal->update();
        return redirect('muertes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
