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
        if($request){
        $query =trim($request->get('searchText'));
        if($query)
        {
            $peso=Peso::where('animal_id','LIKE',$query)
            ->orderBy('registro_peso_id','desc')
            ->paginate(5);
        }
        else{
            $peso=Peso::where('registro_peso_id','LIKE','%'.$query.'%')
            ->orderBy('registro_peso_id','desc')
            ->paginate(5);
        }
            return view('peso.index',["peso"=>$peso,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales=Animal::get();
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
