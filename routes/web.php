<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::guest()) {   //but here it will work
        return redirect('/login');
    } else {
        return view('index');
    }
});

/*rutas ciclica reproducción*/

Route::get('{id}/embarazo', 'EmbarazoController@create')->name('embarazo.create');
Route::get('{id}/partos', 'PartosController@create')->name('partos.create');
Route::get('{id}/abortos', 'AbortosController@create')->name('abortos.create');
Route::get('{id}/monta', 'MontaController@MontaFracaso')->name('monta.fracaso');

/*rutas PDF*/

Route::get('animal/individualm/{id}', 'ReportesController@animalreportem')->name('animal.individualm');
Route::get('animal/individualh/{id}', 'ReportesController@animalreporteh')->name('animal.individualh');
Route::get('muertes/individual/{id}', 'ReportesController@muerteindividual')->name('muerte.individual');
Route::get('monta/individual/{id}', 'ReportesController@montaindividual')->name('monta.individual');
Route::get('embarazo/individual/{id}', 'ReportesController@gestacionindividual')->name('embarazo.individual');
Route::get('partos/individual/{id}', 'ReportesController@partoindividual')->name('partos.individual');
Route::get('abortos/individual/{id}', 'ReportesController@abortoindividual')->name('abortos.individual');
Route::get('ordeno/individual/{id}', 'ReportesController@ordeñoindividual')->name('ordeno.individual');
Route::get('peso/individual/{id}', 'ReportesController@pesoindividual')->name('peso.individual');
Route::get('enfermedades/individual/{id}', 'ReportesController@enfermedadesindividual')->name('enfermedades.individual');
Route::get('vacunas/individual/{id}', 'ReportesController@vacunasindividual')->name('vacunas.individual');
Route::get('actividades/individual/{id}', 'ReportesController@actividadesindividual')->name('actividades.individual');
Route::get('razas/datos','RazaController@datos')->name('razas.datos');

/*rutas Controllers*/

Route::resource('monta', 'MontaController');
Route::resource('animal', 'AnimalController');
Route::resource('ordeno', 'OrdeñoController');
Route::resource('peso', 'PesoController');  
Route::resource('nutricion', 'NutricionController');
Route::resource('enfermedades', 'EnfermedadesController');
Route::resource('vacunas', 'VacunasController');
Route::resource('actividades', 'ActividadesController');
Route::resource('muertes', 'MuerteController');
Route::resource('ventas', 'VentasController');
Route::resource('clientes', 'ClienteController');
Route::resource('razas', 'RazaController');
Route::resource('usuarios', 'UserController');

/*rutas Wilson */

Route::get('/informe-ventas', function () {
    return view('informe-ventas');
});
Route::get('/estado', function () {
    return view('estado');
});

Route::get('/dashboard-hospital', function () {
    return view('dashboard-hospital');
});


Route::get('/reportes', function () {
    return view('reportes');
});

Route::get('/analisis', function () {
    return view('analisis');
});


/*Rutas ciclicas exepciones*/

Route::resource('embarazo', 'EmbarazoController',['except' => ['create']]);
Route::resource('partos', 'PartosController', ['except' => ['create']]);
Route::resource('abortos', 'AbortosController', ['except' => ['create']]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{id}/vacunas', 'VacunasController@SelectVacunas');
Route::get('{id}/nutricion', 'NutricionController@Calculo');
Route::get('{id}/ordeno', 'OrdeñoController@FechaOrdeño');
Route::get('{id}/actividades', 'ActividadesController@SelectActividades');
