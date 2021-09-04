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

    return view('home');
});


 Route::get('map', 'MapController@index')->name('map');
 Route::get('consulta', 'MapController@consulta')->name('consulta');
 Route::get('bold/{taxon}/{geo}', 'MapController@bold')->name('bold');

 Route::get('bold/{taxon}/{geo}', [
      'uses'=> 'MapController@bold',
      'as'  => 'bold'
  ]);
 Route::get('gestion', function()
  {
   return view('gestion');
  });
  Route::get('quienes_somos', function()
  {
   return view('somos');
  });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('departamento','DepartamentoController');
    Route::resource('municipio','MunicipioController');
    Route::resource('coleccion','ColeccionController');
    Route::resource('zona','ZonaController');
    Route::resource('secuencia','SecuenciaController');
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
 Route::resource('especieAmenazada','EspecieAmenazadaController');
 Route::resource('municipio','MunicipioController');
 Route::resource('familia','FamiliaController');
  Route::resource('genero','GeneroController');
  Route::resource('especie','EspecieController');
  Route::resource('especimen','EspecimenController');
  Route::resource('taxonomia','TaxonomiaController');
Route::resource('investigacion','InvestigacionController');

//RUTAS PARA REPORTERIA
Route::get('dominioPrueba.pdf', 'DominioController@generatePDF');
Route::get('especieAmenazada.pdf', 'EspecieAmenazadaController@generatePDF');
Route::get('reporteTaxonomia.pdf', 'TaxonomiaController@generatePDF');
Route::get('/reportePDF.pdf/{id}', 'EspecimenController@generatePDF');
Route::get('/reporteEspecie/{idReino}', 'EspecieController@reportePDF')->name('reporte2');
Route::get('index_filter', 'EspecieController@index');
//Route::get('reporte2.pdf', 'EspecieController@reportePDF');
});



