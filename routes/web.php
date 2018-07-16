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

Route::get('/admin', function () {
    return redirect('/login');
});

Route::get('/test', 'TestController@index');
Route::get('/registro', 'TestController@registro');
Route::get('/buscar_municipio/{departamento}', 'TestController@buscar_municipio');
Route::get('/buscar_identificacion/{identificacion}', 'TestController@buscar_identificacion');
Route::post('/procesar_registro', 'TestController@procesar_registro');
Route::post('/entrar', 'EntrarController@login')->name('entrar');
Route::get('/salir', 'EntrarController@salir')->name('salir');
Route::get('/inicio', 'TestController@inicio')->name('inicio');
Route::get('/bienvenido', 'TestController@bienvenido')->name('bienvenido');
Route::get('/test', 'TestController@test')->name('test');
Route::get('/analisis', 'TestController@analisis')->name('analisis');
Route::post('/contestar', 'TestController@contestar')->name('contestar');
Route::get('/calcular', 'TestController@calcular')->name('calcular');
Route::get('/historico', 'TestController@historico')->name('historico');
Route::get('/consulta_cambio', 'TestController@consulta_cambio')->name('consulta_cambio');
Route::get('/importar', 'ImportarController@index')->name('importar');
Route::post('/importar', 'ImportarController@index2')->name('importar');
Route::get('/souvenir', 'SouvenirController@index')->name('souvenir');
Route::post('/souvenir_b', 'SouvenirController@buscar_doc')->name('souvenir_b');
Route::post('/entregar', 'SouvenirController@entregar')->name('entregar');
Route::post('/proceso_orden_categoria', 'OrdenController@proceso_orden_categoria')->name('proceso_orden_categoria');
Route::post('/proceso_orden_preguntas', 'OrdenController@proceso_orden_preguntas')->name('proceso_orden_preguntas');
Route::post('/proceso_orden_pr', 'OrdenController@proceso_orden_pr')->name('proceso_orden_pr');




Auth::routes();

Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/home', 'HomeController@index');

Route::resource('usuarios', 'UsuariosController');


Route::resource('estados', 'EstadosController');

Route::resource('categorias', 'CategoriaController');

Route::resource('preguntas', 'PreguntasController');

Route::resource('posiblesRespuestas', 'PosiblesRespuestasController');

Route::resource('subtitulos', 'SubtituloController');

Route::resource('subtitulo2s', 'Subtitulo2Controller');

Route::get('/vista_generar_rd', 'ReportesController@v_generar_rd')->name('vista_generar_rd');
Route::post('/generar_rd', 'ReportesController@generar_rd')->name('generar_rd');

Route::get('/vista_generar_cd', 'ReportesController@v_generar_cd')->name('vista_generar_cd');
Route::post('/generar_cd', 'ReportesController@generar_cd')->name('generar_cd');

Route::get('/vista_cht', 'ReportesController@vista_cht')->name('vista_cht');
Route::post('/generar_cht', 'ReportesController@generar_cht')->name('generar_cht');

Route::prefix('web_page')->group(function () {
    Route::get('/menu', 'WebController@menu');
    Route::get('/adm_menu', 'WebController@adm_menu');
    Route::get('/bienvenido', 'WebController@bienvenido');
    Route::get('/faq', 'WebController@faq');
    Route::get('/test', 'WebController@test');
    Route::get('/contacto', 'WebController@contacto');
});

Route::get('/', function () {
    return redirect('/web');
});