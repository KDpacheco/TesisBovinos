<?php

namespace App\Http\Controllers;

use App\Abortos;
use App\Animal;
use App\Embarazo;
use App\Http\Requests\AbortosFormRequest;
use Illuminate\Support\Facades\Redirect;

class AbortosController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('abortos.index');
    }

    public function datos(){
        $abortos=Abortos::get();
        return datatables()->of($abortos)
        ->addColumn('pdf', function ($pdf) {
            return '<a href="' . route('abortos.individual', $pdf->abortos_id) . '">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Informe del aborto"><i class="mdi mdi-file-pdf"></i>
            </button></a>';
        }
        )
        ->rawColumns(['pdf'])->toJson();
    }
    public function create($id)
    {
        return view("abortos.create", ["embarazos" => Embarazo::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("abortos.edit", ["embarazos" => Embarazo::findOrFail($id)]);
    }
    public function store(AbortosFormRequest $request3)
    {
        $abortos = new Abortos;
        $abortos->animal_id = $request3->get('animal_madre');
        $abortos->abortos_tipo = $request3->get('tipo');
        $abortos->abortos_fecha = $request3->get('fecha');
        $abortos->embarazo_id = $request3->embarazo_id;
        $abortos->save();

        $madre = Animal::findOrFail($request3->get('animal_madre'));
        $madre->animal_estado = 1;
        $madre->update();
        $embarazo = Embarazo::findOrFail($request3->embarazo_id);
        $embarazo->embarazo_activo = false;
        $embarazo->update();
        return redirect('abortos');
    }

}
