<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;    
use App\Http\Requests;
use App\Peso;
use App\Http\Requests\PesoFormRequest;
use App\Animal;
use DB;
use DateTime;

class PesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
        
        if(!empty($request->from_date))
        {
            $peso=Peso::whereBetween('registro_peso_fecha', array($request->from_date, $request->to_date))->get();
        }
        else{
            $peso=Peso::get();
        }
        return datatables()->of($peso)
        ->addColumn('pdf', function ($pdf) {
            return '<a href="' . route('peso.individual', $pdf->registro_peso_id) . '">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
            </button></a>';
        }
        )
        ->rawColumns(['pdf'])
        ->make(true);
        }
        return view('peso.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales=Animal::where('animal_estado','<',2)->orWhere('animal_estado','>',3)->get();
        return view('peso.create',["animales"=>$animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesoFormRequest $request)
    {
        $peso= new Peso;
        $animal=Animal::findOrFail($request->get('animal'));
        $peso->animal_id=$request->get('animal');
        $peso->registro_peso_fecha=$request->get('fecha');
        $peso->registro_peso_valor=$request->get('peso');
        $peso->save();
        $animal->animal_peso=$request->get('peso');
        $animal->update();
        return redirect('peso');

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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
