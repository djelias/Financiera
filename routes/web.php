<?php

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

    return view('welcome');
});

 Route::resource('coleccion','ColeccionController');
 Route::resource('zona','ZonaController');
 Route::resource('dominio','DominioController');
 Route::resource('secuencia','SecuenciaController');
 Route::resource('riesgo','RiesgoController');
 Route::resource('tipoInvestigacion','TipoInvestigacionController');
 Route::resource('reino','ReinoController');
 Route::resource('filum','FilumController');
 Route::resource('clase','ClaseController');
 Route::resource('orden','OrdenController');
 Route::resource('especieAmenazada','especieAmenazadaController');
 Route::resource('municipio','MunicipioController');
 Route::resource('familia','FamiliaController');
 Route::get('map', 'MapController@index')->name('map');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('departamento','DepartamentoController');
});

