<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Enfermedades;
use App\Http\Requests\EnfermedadesFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnfermedadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if (request()->ajax()) {

            if (!empty($request->from_date)) {
                $enfermedades = Enfermedades::whereBetween('enfermedad_fecha', array($request->from_date, $request->to_date))->get();
            } else {
                $enfermedades = Enfermedades::get();
            }
            return datatables()->of($enfermedades)
                ->addColumn('pdf', function ($pdf) {
                    return '<a href="' . route('enfermedades.individual', $pdf->registro_enfermedades_id) . '">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
            </button></a>
            <a href="' . route('enfermedades.edit', $pdf->registro_enfermedades_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
                }
                )
                ->rawColumns(['pdf'])
                ->make(true);
        }
        return view('enfermedades.index');
    }
    public function create()
    {
        $animales = Animal::where('animal_estado', '<', 2)->where('animal_id','!=',"inseminación")
            ->orWhere('animal_estado', '>', 3)->get();
        return view('enfermedades.create', ["animales" => $animales]);
    }
    public function edit($id)
    {
        $animales = Animal::where('animal_estado', '<', 2)->where('animal_id','!=',"inseminación")
->orWhere('animal_estado', '>', 2)->get();
        return view('enfermedades.edit', ["animales" => $animales, "enfermedad" => Enfermedades::findOrFail($id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnfermedadesFormRequest $request)
    {
        $enfermedades = new Enfermedades;
        $enfermedades->animal_id = $request->get('animal');
        $enfermedades->enfermedad_fecha = $request->get('fecha');
        $enfermedades->enfermedad_nombre = $request->get('enfermedad');
        $enfermedades->enfermedad_estado = $request->get('estado');
        if ($request->get('estado') == "Tratado") {
            $enfermedades->enfermedad_fecha_tratamiento = $request->get('fecha_tratamiento');
            $enfermedades->enfermedad_tratamiento = $request->get('tratamiento');
        }

        $enfermedades->save();
        return redirect('enfermedades');
    }
    public function update(EnfermedadesFormRequest $request, $id)
    {
        $enfermedades = Enfermedades::findOrFail($id);
        $enfermedades->animal_id = $request->get('animal');
        $enfermedades->enfermedad_fecha = $request->get('fecha');
        $enfermedades->enfermedad_nombre = $request->get('enfermedad');
        
        if($request->get('estado')=="No Tratado")
        {
            $enfermedades->enfermedad_fecha_tratamiento = null;
        $enfermedades->enfermedad_tratamiento = null;
        }
        else{
            $enfermedades->enfermedad_fecha_tratamiento = $request->get('fecha_tratamiento');
            $enfermedades->enfermedad_tratamiento = $request->get('tratamiento');
        }
        
        $enfermedades->enfermedad_estado = $request->get('estado');
        $enfermedades->update();
        return redirect('enfermedades');
    }

}
