<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Embarazo;
use App\Http\Requests\EmbarazoFormRequest;
use App\Monta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmbarazoController extends Controller
{
    public function __construct()
    {

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
                $embarazos = Embarazo::whereBetween('embarazos_fecha', array($request->from_date, $request->to_date))->get();
            }
            else{
                if(!empty($request->from_date2)){
                    
                    $embarazos = Embarazo::whereBetween('fecha_aproximada', array($request->from_date2, $request->to_date2))->get();
                }else{
                    $embarazos = Embarazo::get();
                }
              
            }
            return datatables()->of($embarazos)
        ->addcolumn('proxima',function($proxima){
            return $proxima->fecha_aproximada->toDateString();
        })
            ->addColumn('activo', function ($activo) {
                if ($activo->embarazo_activo == true) {
                    return 'Si';
                } else {
                    return 'No';
                }
            })
            ->addColumn('fin', function ($fin) {
                if ($fin->embarazo_activo == true) {
                    return '<a href="' . route('partos.create', $fin->embarazos_id) . '"
                class="confirmation">
                <button class="btn btn-primary">Registrar Parto</button>
            </a>
            <a href="' . route('abortos.create', $fin->embarazos_id) . '"
                class="confirmation">
                <button class="btn btn-primary">Registrar Aborto</button>
            </a>';
                } else {
                    return '<a> <button class="button btn btn-primary" disabled >Registrar Parto</button>
                    </a>  
                    <a><button class=" button btn btn-primary" disabled >Registrar Aborto</button></a>';
                }
            })
            ->addColumn('pdf', function ($pdf) {
                return '<a href="' . route('embarazo.individual', $pdf->embarazos_id) . '">
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Informe Individual del animal"><i class="mdi mdi-file-pdf"></i>
                </button></a>';
            }
            )
            ->rawColumns(['activo','fin','proxima','pdf'])
            ->make(true);
            }
        return view('embarazo.index');

    }

    public function create($id)
    {
        $monta = Monta::findOrFail($id);
        return view("embarazo.create", ["animales" => $monta]);
    }

    public function show($id)
    {
        return view("embarazo.show", ["embarazo" => Embarazo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function store(EmbarazoFormRequest $request)
    {
        $embarazos = new Embarazo;
        $monta = Monta::findOrFail($request->get('monta_id'));
        $madre = Animal::findOrFail($request->get('código_madre'));
        $embarazos->animal_madre = $request->get('código_madre');
        $embarazos->animal_padre = $request->get('código_padre');
        $embarazos->embarazos_fecha = $request->get('fecha');
        $embarazos->monta_id = $monta->monta_id;
        $fecha = Carbon::parse($request->get('fecha'));
        $fecha->addDays(279);
        $embarazos->fecha_aproximada = $fecha;
        $embarazos->embarazo_activo = 1;
        $embarazos->save();

        $madre->animal_estado = 4;
        $madre->update();
        $monta->monta_exitosa = "Si";
        $monta->update();
        return redirect('embarazo');
    }

}
