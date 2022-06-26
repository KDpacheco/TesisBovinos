<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Http\Requests\VentasFormRequest;
use App\Http\Requests\ClienteFormRequest;
use App\Ventas;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $ventas = Ventas::join('cliente', 'cliente.cedula', '=', 'ventas.cedula_cliente')
                    ->join('animal', 'animal.animal_id', '=', 'ventas.animal_id')
                    ->whereBetween('registro_muertes_fecha', array($request->from_date, $request->to_date))
                    ->get();

            } else {
                $ventas = Ventas::join('cliente', 'cliente.cedula', '=', 'ventas.cedula_cliente')
                    ->join('animal', 'animal.animal_id', '=', 'ventas.animal_id')
                    ->get();
            }
            return datatables()
                ->of($ventas)
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
                ->addColumn('pdf', function ($pdf) {
                    return '<a href="' . route('muerte.individual', $pdf->ventas_id) . '">
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Informe de venta"><i class="mdi mdi-file-pdf"></i>
                </button></a>
                <a href="' . route('ventas.edit', $pdf->ventas_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
                })
                ->rawColumns(['btn', 'pdf'])
                ->make(true);
        }

        return view('ventas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales = Animal::where('animal_estado', '<', 2)->where('animal_id','!=',"inseminación")->orWhere('animal_estado','>',3)->get();
        $clientes=Cliente::get();

        return view('ventas.create', ["animales" => $animales,"clientes"=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentasFormRequest $request, ClienteFormRequest $rrquest )
    {
        $cliente= new Cliente;
        $ventas = new Ventas;
        if($request->get('cliente')=="nuevo")
        {
            $cliente->cedula=$request->get('cedula');
            $cliente->nombre=$request->get('nombre');
            $cliente->teléfono=$request->get('telefono');
            $cliente->save();
            $ventas->cedula_cliente = $request->get('cedula');
        }
      else{
        $ventas->cedula_cliente = $request->get('cliente');
      }
      $animal = Animal::findOrFail($request->get('animal'));
        $ventas->animal_id = $request->get('animal');
        $ventas->ventas_fecha = $request->get('fecha');
        $ventas->ventas_valor = $request->get('valor');
        $ventas->estado_anterior= $animal->animal_estado;
        $ventas->save();
        $animal = Animal::findOrFail($request->get('animal'));
        $animal->animal_estado = 3;
        $animal->update();
        return redirect('ventas');
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
        $clientes=Cliente::get();
        return view('ventas.edit', ["animales" => $animales,"venta"=>Ventas::findOrFail($id),"clientes"=>$clientes]);
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
        $cliente= new Cliente;
        $ventas = Ventas::findOrFail($id);

        if($request->get('cliente')=="nuevo")
        {
            $cliente->cedula=$request->get('cedula');
            $cliente->nombre=$request->get('nombre');
            $cliente->teléfono=$request->get('telefono');
            $cliente->save();
            $ventas->cedula_cliente = $request->get('cedula');
        }
      else{
        $ventas->cedula_cliente = $request->get('cliente');
      }
      $animal = Animal::findOrFail($request->get('animal'));
      if($ventas->animal_id!=$animal->animal_id)
        {
            $animal2=Animal::findOrFail($ventas->animal_id);
            $animal2->animal_estado=$ventas->estado_anterior;
            $animal2->update();
        }
        $ventas->animal_id = $request->get('animal');
        $ventas->ventas_fecha = $request->get('fecha');
        $ventas->ventas_valor = $request->get('valor');
        $ventas->estado_anterior= $animal->animal_estado;
        $ventas->save();
        $animal = Animal::findOrFail($request->get('animal'));
        $animal->animal_estado = 3;
        $animal->update();
        return redirect('ventas');
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
