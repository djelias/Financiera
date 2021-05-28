<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('login', 'API\LoginController@login');
Route::resource('coleccion','API\ColeccionController');
Route::resource('especimen','API\EspecimenController');
Route::resource('investigacion','API\InvestigacionController');
Route::resource('taxonomia','API\TaxonomiaController');


Route::middleware('auth:api')->group( function () {
    Route::resource('users', 'API\UserController');
});