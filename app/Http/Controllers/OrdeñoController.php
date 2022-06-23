<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Http\Requests\OrdeñoFormRequest;
use App\Ordeño;
use App\Partos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrdeñoController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $ordeño = Ordeño::whereBetween('registro_ordeño_fecha', array($request->from_date, $request->to_date))->get();
            } else {
                $ordeño = Ordeño::get();
            }
            return datatables()->of($ordeño)
                ->addColumn('pdf', function ($pdf) {
                    return '<a href="' . route('ordeno.individual', $pdf->registro_ordeño_id) . '">
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
                </button></a>
                <a href="' . route('ordeno.edit', $pdf->registro_ordeño_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
                }
                )
                ->rawColumns(['pdf'])
                ->make(true);
        }
        return view('ordeno.index');
    }
    public function create()
    {
        $animales = Animal::select('animal_id')->where('animal_produccion', '=', 2)
        ->where('animal_estado', '!=', 2)
        ->Where('animal_estado', '!=', 3)
            
            ->get();

        return view("ordeno.create", ["animales" => $animales]);

    }
    public function edit($id)
    {
        $animales = Animal::select('animal_id')->where('animal_produccion', '=', 2)
        ->where('animal_estado', '!=', 2)
        ->Where('animal_estado', '!=', 3)   
            ->get();
        return view("ordeno.edit",["animales" => $animales,"ordeño"=>Ordeño::findOrFail($id)]);
    }
    public function store(OrdeñoFormRequest $request)
    {
        $ordeño = new Ordeño;
        $ordeño->animal_id = $request->get('código');
        $ordeño->registro_ordeño_litros = $request->get('litros');
        $ordeño->registro_ordeño_cantidad = $request->get('cantidad');
        $ordeño->registro_ordeño_fecha = $request->get('fecha');
        $ordeño->partos_id = $request->get('ordeño_parto');
        $ordeño->save();
        return redirect('ordeno');
    }

    public function FechaOrdeño($id)
    {
        $partos = Partos::select('partos_fecha', 'partos_id')
            ->where('partos_madre', '=', $id)
            ->orderBy('partos_fecha', 'desc')->first();

        return $partos;
    }

    public function update(OrdeñoFormRequest $request,$id)
    {
        $ordeño = Ordeño::findOrFail($id);
        $ordeño->animal_id = $request->get('código');
        $ordeño->registro_ordeño_litros = $request->get('litros');
        $ordeño->registro_ordeño_cantidad = $request->get('cantidad');
        $ordeño->registro_ordeño_fecha = $request->get('fecha');
        $ordeño->partos_id = $request->get('ordeño_parto');
        $ordeño->save();
        return redirect('ordeno');
    }
}
