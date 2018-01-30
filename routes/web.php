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

Route::group(['middleware' => 'cors'], function () {

Route::get('paginasjson', 'PaginasController@indexjson');
Route::get('paginajson/{pagina}/{device}', 'PaginasController@configurarjson');
Route::post('buzonjson/{device}', 'BuzonController@buzonjson');
Route::post('evaluarjson/{device}', 'EvaluarController@evaluarjson');
Route::post('evaluarjson/{device}', 'EvaluarController@evaluarjson');
Route::post('iniciarsesionjson', 'PaginasController@iniciarsesionjson');
});


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    #


Route::resource('tipos', 'TiposController');
Route::resource('evaluar', 'EvaluarController');
Route::resource('buzon', 'BuzonController');
Route::resource('/', 'PaginasController');
Route::resource('paginas', 'PaginasController');
Route::get('paginas/{pagina}/configurar', 'PaginasController@configurar')->name('paginas.configurar');
Route::get('registros', 'PaginasController@vistasporpaginas')->name('paginas.registros');
Route::post('paginas/{pagina}/configurar', 'PaginasController@configurarstore')->name('paginas.configurarstore');
Route::resource('galerias', 'GaleriasController');
Route::resource('encuestas', 'EncuestasController');

Route::post('galerias/{galeria}/addvideo', 'VideosController@store')->name('videos.addvideo');
Route::DELETE('galerias/{video}/{galeria}/eliminar', 'VideosController@destroy')->name('videos.eliminar');
//json




});
