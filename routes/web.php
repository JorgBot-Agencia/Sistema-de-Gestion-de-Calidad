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
 //   return redirect('login');
	return view("welcome");
});
Auth::routes();
///////////////////////////////////////////////
//////////////////////Rutas de controllador Indicador
///////////////////////////////////////////////
Route::get('/presentacion-indicadores','IndicadorController@presentacion')->name("presentacion-indicadores");
Route::get('/C_present_indicador','IndicadorController@present_indicador')->name("C_present_indicador");
Route::get('/Visualizacion','IndicadorController@visualizar_indicador')->name("visualizar_indicador");
Route::post('/Indicador_busquedad','IndicadorController@Indicador_busquedad')->name("Indicador_busquedad");
Route::post('/Indicadores_subproceso','IndicadorController@Indicadores_subproceso')->name("Indicadores_subproceso");
Route::post('/Indicadores_subproceso_proceso','IndicadorController@Indicadores_subproceso_proceso')->name("Indicadores_subproceso_proceso");

Route::post('/Indicadores_get_resultado','OperationsController@Indicadores_get_resultado')->name("Indicadores_get_resultado");



Route::get('/register','IndicadorController@register')->name("register");
Route::resource('Indicador', 'IndicadorController');






///////////////////////////////////////////////
//////////////////////Rutas de controllador Operations
///////////////////////////////////////////////

Route::post('/formula_indicador','OperationsController@formula_indicador')->name("formula_indicador");
Route::post('/Get_indicador','OperationsController@get_indicadores_proceso')->name("Get_indicador");






///////////////////////////////////////////////
//////////////////////Rutas de controllador CRUDS
///////////////////////////////////////////////

Route::get('/Procesos','CRUDSController@procesos_view')->name("Procesos");
Route::get('/Procesos/{id}/{ruta}/','CRUDSController@Procesos_Visualiza')->name("Procesos_Visualiza");
Route::post('/procesos_update/','CRUDSController@procesos_update')->name("procesos_update");
Route::post('/procesos_create/','CRUDSController@procesos_create')->name("procesos_create");
Route::post('/procesos_delete/','CRUDSController@procesos_delete')->name("procesos_delete");








Route::get('/Indicadores','CRUDSController@Indicadores_all')->name("Indicadores");
Route::get('/Indicadores/{id}/{ruta}/','CRUDSController@Indicadores_Ver')->name("Indicadores_Ver");
Route::post('/Indicadores_update/','CRUDSController@Indicadores_update')->name("Indicadores_update");
Route::post('/Indicadores_create/','CRUDSController@Indicadores_create')->name("Indicadores_create");
Route::post('/Indicadores_delete/','CRUDSController@Indicadores_delete')->name("Indicadores_delete");





Route::get('/home', 'HomeController@index')->name('home');
