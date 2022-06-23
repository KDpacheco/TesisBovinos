<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Raza;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class RazaController extends Controller
{
    public function index()
    {

        return view('razas.index');
    }
    public function create()
    {
        return view('razas.create');
    }
    public function store(Request $request)
    {
        $request['acronimo'] = Str::upper($request['acronimo']);
        $validated = $request->validate([
            'raza_nombre' => 'required|unique:raza,raza_nombre',
            'acronimo' => 'required|unique:raza,acr',
        ]);
        $raza = new Raza;
        $raza->raza_nombre = $request->get('raza_nombre');
        $raza->acr = $request->get('acronimo');
        $raza->save();
        return redirect('razas');
    }

    public function edit($id)
    {
        return view('razas.edit', ["razas" => Raza::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $request['acronimo'] = Str::upper($request['acronimo']);
        $validated = $request->validate([
            'raza_nombre' => 'required|unique:raza,raza_nombre,' . $id . ',raza_id',
            'acronimo' => 'required|unique:raza,acr,' . $id . ',raza_id',
        ]);
        $raza = Raza::findOrFail($id);
        if ($raza->acr != $request->get('acronimo')) {
            $animal = Animal::where('animal_raza', '=', $id)->orderBy('created_at', 'asc')->get();
            foreach ($animal as $ani) {
                $animal2 = Animal::where('animal_padre', '=', $ani->animal_id)->orWhere('animal_madre', '=', $ani->animal_id)->get();
                $newid = IdGenerator::generate(['table' => 'animal', 'field' => 'animal_id', 'length' => 7, 'prefix' => $request->get('acronimo'), 'reset_on_prefix_change' => true]);
                $ani->animal_id = $newid;
                if ($ani->animal_sexo == "Hembra") {
                    foreach ($animal2 as $ani2) {
                        $ani2->animal_madre = $newid;
                        $ani2->update();
                    }
                } else {
                    foreach ($animal2 as $ani2) {
                        $ani2->animal_padre = $newid;
                        $ani2->update();
                    }
                }
                $ani->update();
            }

        }
        $raza->raza_nombre = $request->get('raza_nombre');
        $raza->acr = $request->get('acronimo');
        $raza->update();
        return redirect('animal');
    }
    public function datos()
    {

        $raza = Raza::get();

        return datatables()->of($raza)
            ->addColumn('pdf', function ($pdf) {
                return '<a href="' . route('razas.edit', $pdf->raza_id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
            }
            )
            ->rawColumns(['pdf'])
            ->toJson();
    }
}
