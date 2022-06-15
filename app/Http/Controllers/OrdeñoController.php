<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Ordeño;
use App\Animal;
use App\Partos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\OrdeñoFormRequest;
use DB;
use DateTime;

class OrdeñoController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query =trim($request->get('searchText'));
            if($query)
            {
                $ordeño=Ordeño::where('animal_id','LIKE',$query)
            ->orderBy('registro_ordeño_id','desc')
            ->paginate(5);

            }
            else{
                $ordeño=Ordeño::where('animal_id','LIKE','%'.$query.'%')
            ->orderBy('registro_ordeño_id','desc')
            ->paginate(5);
            }
            
            return view('ordeño.index',["ordeño"=>$ordeño,"searchText"=>$query]);
        }
    }
    public function create()
    {  
        $animales=Animal::select('animal_id')->where('animal_produccion','=',2)
        ->get();
        
        return view("ordeño.create",["animales"=>$animales]);
       
    }
    public function store(OrdeñoFormRequest $request)
    {
        $ordeño= new Ordeño;
        $ordeño->animal_id=$request->get('código');
        $ordeño->registro_ordeño_litros=$request->get('litros');
        $ordeño->registro_ordeño_cantidad=$request->get('cantidad');
        $ordeño->registro_ordeño_fecha=$request->get('fecha');
        $ordeño->partos_id=$request->get('ordeño_parto');
        $ordeño->save();
        return redirect('ordeño');
    }

    public function FechaOrdeño($id)
    {
        $partos=Partos::select('partos_fecha','partos_id') 
        ->where('partos_madre','=',$id)
        ->orderBy('partos_fecha','desc')->first() ;
       
        return $partos;
    }
}
