<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Http\Requests\MuerteFormRequest;
use App\Muertes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MuerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $muerte = Muertes::join('animal', 'animal.animal_id', '=', 'registro_muertes.animal_id')
                ->select('registro_muertes.*', 'animal.animal_sexo')->whereBetween('registro_muertes_fecha', array($request->from_date, $request->to_date))
                ->get();
    
            }
            else
            {
                $muerte = Muertes::join('animal', 'animal.animal_id', '=', 'registro_muertes.animal_id')
            ->select('registro_muertes.*', 'animal.animal_sexo')
            ->get();
            }
            return datatables()
            ->of($muerte)
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
            ->addColumn('pdf', function($pdf){
                return '<a href="' . route('muerte.individual', $pdf->registro_muertes_id) . '">
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
                </button></a>';
            })
            ->rawColumns(['btn','pdf'])
            ->make(true);
        }

        return view('muertes.index');
    }
    public function datos()
    {

        $muerte = Muertes::join('animal', 'animal.animal_id', '=', 'registro_muertes.animal_id')
            ->select('registro_muertes.*', 'animal.animal_sexo')
            ->get();

        return datatables()
            ->of($muerte)
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
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales = Animal::where('animal_estado', '<>', 2)->get();
        return view('muertes.create', ["animales" => $animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuerteFormRequest $request)
    {
        $muertes = new Muertes;
        $muertes->animal_id = $request->get('animal');
        $muertes->registro_muertes_fecha = $request->get('fecha');
        $muertes->registro_muertes_causa = $request->get('causa');
        $muertes->save();
        $animal = Animal::findOrFail($request->get('animal'));
        $animal->animal_estado = 2;
        $animal->update();
        return redirect('muertes');
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
        //
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
