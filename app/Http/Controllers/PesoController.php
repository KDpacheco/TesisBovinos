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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
                title="Informe del peso"><i class="mdi mdi-file-pdf"></i>
            </button></a>
            <a href="' . route('peso.edit', $pdf->registro_peso_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
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
        $animales=Animal::where('animal_estado','<',2)->where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
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
        $peso->peso_anterior=$animal->animal_peso;
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
        $animales=Animal::where('animal_estado','<',2)->where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
        return view('peso.edit',["animales"=>$animales,"peso"=>Peso::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PesoFormRequest $request, $id)
    {
        $peso= Peso::findOrFail($id);
        $animal=Animal::findOrFail($request->get('animal'));
        if($animal->animal_id!=$peso->animal_id)
        {
            $animal2=Animal::findOrFail($peso->animal_id);
            $animal2->animal_peso=$peso->peso_anterior;
            $animal2->update();
        }
        $peso->animal_id=$request->get('animal');
        $peso->peso_anterior=$animal->animal_peso;
        $peso->registro_peso_fecha=$request->get('fecha');
        $peso->registro_peso_valor=$request->get('peso');
        $peso->update();
        $animal->animal_peso=$request->get('peso');
        $animal->update();
        return redirect('peso');
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
