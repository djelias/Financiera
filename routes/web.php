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
 Route::get('bitacoras', 'MapController@bitacoras')->name('bitacoras');
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

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('departamento','DepartamentoController');
    Route::resource('municipio','MunicipioController');
    Route::resource('coleccion','ColeccionController');
    Route::resource('prestatario','PrestatarioController');
    Route::resource('publicacion','PublicacionController');
    Route::resource('aprobacion','AprobacionController');
    Route::resource('zona','ZonaController');
    Route::resource('secuencia','SecuenciaController');
     Route::resource('coleccion','ColeccionController');
 Route::resource('zona','ZonaController');
 Route::resource('dominio','DominioController');
 
 Route::resource('pago','PagoController');
 Route::resource('partidac','PartidacController');
 Route::get('balancec','PartidacController@estadoc')->name('reporteBalance');
 Route::resource('prestamo','PrestamoController');
 Route::resource('prestatario','PrestatarioController');
 Route::resource('contribuyente','ContribuyenteController');
 Route::resource('catcuenta','CatcuentaController');
 Route::resource('libcompras','LibcomprasController');
 
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

Route::get('partidacPrueba.pdf', 'PartidacController@generatePDF');
Route::get('pagoPrueba.pdf', 'PagoController@generatePDF');
Route::get('contribuyentePrueba.pdf', 'ContribuyenteController@generatePDF');
Route::get('catcuentaPrueba.pdf', 'CatcuentaController@generatePDF');
Route::get('libcomprasPrueba.pdf', 'LibcomprasController@generatePDF');
Route::get('/prestamoPrueba.pdf/{id}', 'PrestamoController@generatePDF')->name('reportePre');

Route::get('exportPartidac', 'PartidacController@exportExcel')->name('excelPartidac');
Route::get('exportLibcompras', 'LibcomprasController@exportExcel')->name('excelLibcompras');

Route::get('especieAmenazada.pdf', 'EspecieAmenazadaController@generatePDF');
Route::get('reporteTaxonomia.pdf', 'TaxonomiaController@generatePDF');
Route::get('/reportePDF.pdf/{id}', 'EspecimenController@generatePDF');
Route::get('/reporteEspecie/{idReino}', 'EspecieController@reportePDF')->name('reporte2');
Route::get('index_filter', 'EspecieController@index');
//Route::get('reporte2.pdf', 'EspecieController@reportePDF');


//Rutas para Facebook y google



});



