<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;    
use App\Http\Requests;
use App\Actividades;
use Carbon\Carbon;
use App\Http\Requests\ActividadesFormRequest;
use App\ListaActividades;
use App\Animal;
use DB;
use DateTime;

class ActividadesController extends Controller
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
        if(request()->ajax()){
            
            if(!empty($request->from_date))
            {
                $data=Actividades::join('actividades','registro_actividades.actividades_id','=','actividades.actividades_id')->whereBetween('registro_actividades_fecha', array($request->from_date, $request->to_date))->get();
            }
            else{
                $data=Actividades::join('actividades','registro_actividades.actividades_id','=','actividades.actividades_id')->get();
            }
            return datatables()->of($data)
        ->addColumn('proxima',function($proxima){
            if($proxima->registro_actividades_proxima==null)
            {
                return "Actividad Única";
            }
            else{
               return $proxima->registro_actividades_proxima->toDateString();
            }
        })
        ->addColumn('pdf', function ($pdf) {
            return '<a href="' . route('actividades.individual', $pdf->registro_actividades_id) . '">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Informe de la activdad"><i class="mdi mdi-file-pdf"></i>
            </button></a>
            <a href="' . route('actividades.edit', $pdf->registro_actividades_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
        }
        )
        ->rawColumns(['pdf','proxima'])
        ->make(true);   
 
        }
        return view('actividades.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales=Animal::where('animal_estado','<',2)->where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
        return view('actividades.create',["animales"=>$animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadesFormRequest $request)
    {
        $actividades = new Actividades;
        $actividades->animal_id = $request->get('animal');
        $actividades->actividades_id=$request->get('actividad');
        $actividades->registro_actividades_fecha=$request->get('fecha');
        $actividades->registro_actividades_proxima=$this->CalcFecha($request->get('fecha'),$request->get('actividad'));
        $actividades->save();
        return redirect('actividades'); 
    }

    protected function CalcFecha($fecha,$actividad)
    {
        $fecha=Carbon::parse($fecha);
    
        if($actividad==6)
        {
           return $fecha->addMonths(5);
        }
        else{
            if($actividad==7){
               return $fecha->addMonths(5); 
            }
            else{
                if($actividad==8){
                    return $fecha->addDays(15);
                }
                else
                {
                    return $fecha=null;
                }
            }
        }
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
        return view('actividades.edit',["animales"=>$animales,'actividad'=>Actividades::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadesFormRequest $request, $id)
    {
        $actividades = Actividades::findOrFail($id);
        $actividades->animal_id = $request->get('animal');
        $actividades->actividades_id=$request->get('actividad');
        $actividades->registro_actividades_fecha=$request->get('fecha');
        $actividades->registro_actividades_proxima=$this->CalcFecha($request->get('fecha'),$request->get('actividad'));
        $actividades->update();
        return redirect('actividades'); 
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

    public function SelectActividades($id)
    {
        $animales=Animal::findOrFail($id);
        $cat=$animales->animal_categoria;
        if($cat==1)
        {
            return ListaActividades::where('actividades_nivel','=',1)->get();
        }
        else
        {
            return ListaActividades::where('actividades_nivel','=',2)->get();
        }
    }
}
