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

Route::group(['middleware'=>'auth'],function(){
        
    Route::get('/demolay', 'DemolayController@listar');
    Route::get('/demolayCadastrar', 'DemolayController@cadastrar');
    Route::get('/demolay/editar/{id}', 'DemolayController@editar');
    Route::get('/demolay/remover/{id}', 'DemolayController@remover');
    Route::post('/demolay/salvar/{id}', 'DemolayController@salvar');
    Route::get('/demolay/confirmar/{id}', 'DemolayController@confirmar');
    
    Route::get('/frequencia', 'FrequenciaController@listar');
    Route::get('/frequenciaCapitulo', 'FrequenciaController@listarCapitulo');
    Route::get('/frequenciaCadastrar', 'FrequenciaController@cadastrar');
    Route::get('/frequencia/editar/{id}', 'FrequenciaController@editar');
    Route::get('/frequencia/remover/{id}', 'FrequenciaController@remover');
    Route::post('/frequencia/salvar/{id}', 'FrequenciaController@salvar');
    Route::get('/frequencia/confirmar/{id}', 'FrequenciaController@confirmar');

    Route::get('/gestao', 'GestaoController@listar');
    Route::get('/gestaoDemolay', 'GestaoController@listarDemolays');
    Route::get('/gestaoCadastrar', 'GestaoController@cadastrar');
    Route::get('/gestao/editar/{id}', 'GestaoController@editar');
    Route::get('/gestao/remover/{id}', 'GestaoController@remover');
    Route::post('/gestao/salvar/{id}', 'GestaoController@salvar');
    Route::get('/gestao/confirmar/{id}', 'GestaoController@confirmar');


    Route::get('/relatorio', 'RelatorioController@listar');
    Route::get('/relatorioF', 'RelatorioController@listarF');
    Route::get('/relatorioP', 'RelatorioController@listarP');
    Route::get('/relatorioE', 'RelatorioController@listarE');

    Route::resource('trabalhos', 'FileController');
    Route::get('/trabalhos/remover/{id}', 'FileController@destroy');
    Route::get('/trabalhos/confirm/{id}', 'FileController@confirm');

    Route::resource('tasks', 'TasksController');
    Route::resource('frequencia', 'FrequenciaController');
    Route::resource('financa', 'FinancaController');

    Route::get('/financa/remover/{id}', 'FinancaController@destroy');
    Route::get('/financa/confirm/{id}', 'FinancaController@confirm');
    Route::get('/financa/edit/{id}', 'FinancaController@edit');
    Route::get('/financa/update/{id}', 'FinancaController@update');

});

Route::group(['middleware' => 'auth'], function() {

	Route::get('/edit', 'DemolayController@list');
	Route::post('/edit/update/{user}', 'DemolayController@update');

});

Route::get('/main_home', function () {
    return view('main_home');
});




Route::get('/templario', function(){
    return view('templario');
});

Route::get('/porto', function(){
    return view('porto');
});

Auth::routes();
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/main', function () {
    return view('main');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout',function(){
	Auth::logout();
	Session::flush();
	return Redirect::to('/login');
});
