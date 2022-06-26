<?php

namespace App\Http\Controllers;

use App\Abortos;
use App\Actividades;
use App\Animal;
use App\Embarazo;
use App\Enfermedades;
use App\Monta;
use App\Muertes;
use App\Ordeño;
use App\Partos;
use App\Peso;
use App\Vacunas;
use Carbon\Carbon;
use DB;
use PDF;

class ReportesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function animalreporteh($id)
    {

        $animales = Animal::join('categoria', 'animal.animal_categoria', '=', 'categoria.categoria_id')
            ->join('raza', 'animal.animal_raza', '=', 'raza.raza_id')
            ->join('produccion', 'animal.animal_produccion', '=', 'produccion.produccion_id')
            ->join('estados', 'animal.animal_estado', '=', 'estados.estados_id')
            ->where('animal.animal_id', '=', $id)->first();

        $montast = Monta::where('monta_madre', '=', $id)->count();
        $montasexito = Monta::where('monta_madre', '=', $id)
            ->where('monta_exitosa', '=', 'Si')->count();
        $montas2 = Monta::where('monta_madre', '=', $id)
            ->where('monta_exitosa', '=', 'No')->count();

        $gestexito = Partos::where('partos_madre', '=', $id)
            ->count();
        $gestexito2 = Abortos::where('animal_id', '=', $id)
            ->count();

        $partos = Partos::where('partos_madre', '=', $id)->get();

        $periodo = Ordeño::select(DB::raw('MIN(registro_ordeño_fecha) as inicio,MAX(registro_ordeño_fecha) as final,SUM(registro_ordeño_litros) as litros'))
            ->where('animal_id', '=', $id)
            ->groupBy('partos_id')
            ->orderBy('inicio', 'asc')->get();
        $litros = Ordeño::where('animal_id', '=', $id)->sum('registro_ordeño_litros');

        $enfermedadescount = Enfermedades::where('animal_id', '=', $id)->count();
        $enfermedades = Enfermedades::where('animal_id', '=', $id)->get();

        $vacunas = Vacunas::join('vacunas', 'registro_vacunas.vacuna_id', '=', 'vacunas.vacuna_id')
            ->where('registro_vacunas.animal_id', '=', $id)->get();

        $actividades = Actividades::join('actividades', 'registro_actividades.actividades_id', '=', 'actividades.actividades_id')
            ->where('registro_actividades.animal_id', '=', $id)
            ->orderBy('registro_actividades.actividades_id')
            ->orderBy('registro_actividades.registro_actividades_fecha', 'desc')
            ->distinct('registro_actividades.actividades_id')->get();
        $fecha = Carbon::now()->toDateString();

        $pdf = PDF::loadView('animal.individualh', ["animales" => $animales, "montast" => $montast,
            "montasexito" => $montasexito, "montas2" => $montas2, "gestexito" => $gestexito, "gestexito2" => $gestexito2,
            "partos" => $partos, "litros" => $litros, "periodo" => $periodo, "enfermedadescount" => $enfermedadescount,
            "enfermedades" => $enfermedades, "vacunas" => $vacunas, "actividades" => $actividades]);
        return $pdf->stream('reporte-animal-' . $id . '--' . $fecha . '.pdf');

    }

    public function animalreportem($id)
    {

        $animales = Animal::join('categoria', 'animal.animal_categoria', '=', 'categoria.categoria_id')
            ->join('raza', 'animal.animal_raza', '=', 'raza.raza_id')
            ->join('estados', 'animal.animal_estado', '=', 'estados.estados_id')
            ->where('animal.animal_id', '=', $id)->first();

        $montast = Monta::where('monta_padre', '=', $id)->count();
        $montasexito = Monta::where('monta_padre', '=', $id)
            ->where('monta_exitosa', '=', 'Si')->count();
        $montas2 = Monta::where('monta_padre', '=', $id)
            ->where('monta_exitosa', '=', 'No')->count();

        $partos = Animal::join('partos', 'animal.animal_id', '=', 'partos.hijo_id')->where('animal_padre', '=', $id)->get();

        $enfermedadescount = Enfermedades::where('animal_id', '=', $id)->count();
        $enfermedades = Enfermedades::where('animal_id', '=', $id)->get();

        $vacunas = Vacunas::join('vacunas', 'registro_vacunas.vacuna_id', '=', 'vacunas.vacuna_id')
            ->where('registro_vacunas.animal_id', '=', $id)->get();

        $actividades = Actividades::join('actividades', 'registro_actividades.actividades_id', '=', 'actividades.actividades_id')
            ->where('registro_actividades.animal_id', '=', $id)
            ->orderBy('registro_actividades.actividades_id')
            ->orderBy('registro_actividades.registro_actividades_fecha', 'desc')
            ->distinct('registro_actividades.actividades_id')->get();
        $fecha = Carbon::now()->toDateString();

        $pdf = PDF::loadView('animal.individualm', ["animales" => $animales, "montast" => $montast,
            "montasexito" => $montasexito, "montas2" => $montas2, "partos" => $partos, "enfermedadescount" => $enfermedadescount,
            "enfermedades" => $enfermedades, "vacunas" => $vacunas, "actividades" => $actividades]);
        return $pdf->stream('reporte-animal-' . $id . '--' . $fecha . '.pdf');
    }

    public function muerteindividual($id)
    {
        $muerte = Muertes::join('animal', 'animal.animal_id', '=', 'registro_muertes.animal_id')
            ->select('registro_muertes.*', 'animal_nacimiento')
            ->where('registro_muertes.registro_muertes_id', '=', $id)
            ->orderBy('registro_muertes_id', 'desc')
            ->first();
        $edad1 = Carbon::parse($muerte->animal_nacimiento);
        $edad2 = Carbon::parse($muerte->registro_muertes_fecha);
        $edad = $edad1->diff($edad2)->format('%y años, %m meses y %d días');
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('muertes.individual', ["muerte" => $muerte, "edad" => $edad]);
        return $pdf->stream('reporte-muerte-' . $fecha . '.pdf');
    }

    public function montaindividual($id)
    {
        $monta = Monta::where('monta_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('monta.individual', ["monta" => $monta]);
        return $pdf->stream('reporte-monta-codigo-' . $id . '--' . $fecha . '.pdf');
    }
    public function gestacionindividual($id)
    {
        $embarazo = Embarazo::where('embarazos_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('embarazo.individual', ["monta" => $embarazo]);
        return $pdf->stream('reporte-gestacion-codigo-' . $id . '--' . $fecha . '.pdf');
    }

    public function partoindividual($id)
    {
        $partos = Partos::where('partos_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('partos.individual', ["monta" => $partos]);
        return $pdf->stream('reporte-parto-codigo-' . $id . '--' . $fecha . '.pdf');
    }
    public function abortoindividual($id)
    {
        $abortos = Abortos::where('abortos_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('abortos.individual', ["monta" => $abortos]);
        return $pdf->stream('reporte-aborto-codigo-' . $id . '--' . $fecha . '.pdf');
    }
    public function ordeñoindividual($id)
    {
        $ordeño = Ordeño::where('registro_ordeño_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('ordeno.individual', ["monta" => $ordeño]);
        return $pdf->stream('reporte-ordeño-codigo-' . $id . '--' . $fecha . '.pdf');
    }
    public function pesoindividual($id)
    {
        $peso = Peso::where('registro_peso_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('peso.individual', ["monta" => $peso]);
        return $pdf->stream('reporte-peso-codigo-' . $id . '--' . $fecha . '.pdf');
    }

    public function enfermedadesindividual($id)
    {
        $enfermedades = Enfermedades::where('registro_enfermedades_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('enfermedades.individual', ["monta" => $enfermedades]);
        return $pdf->stream('reporte-enfermedad-codigo-' . $id . '--' . $fecha . '.pdf');
    }

    public function vacunasindividual($id)
    {
        $vacunas = Vacunas::join('vacunas', 'vacunas.vacuna_id', '=', 'registro_vacunas.vacuna_id')->where('registro_vacunas_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('vacunas.individual', ["monta" => $vacunas]);
        return $pdf->stream('reporte-vacuna-codigo-' . $id . '--' . $fecha . '.pdf');
    }
    public function actividadesindividual($id)
    {
        $actividades = Actividades::join('actividades', 'actividades.actividades_id', '=', 'registro_actividades.actividades_id')->where('registro_actividades_id', '=', $id)->first();
        $fecha = Carbon::now()->toDateString();
        $pdf = PDF::loadView('actividades.individual', ["monta" => $actividades]);
        return $pdf->stream('reporte-actividades-codigo-' . $id . '--' . $fecha . '.pdf');
    }

}
