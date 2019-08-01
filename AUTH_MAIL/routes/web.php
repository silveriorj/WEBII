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

Route::post('/enviar', 'MailController@enviar');
Route::post('/concluir', 'MailController@concluir');

Route::get('/socios', 'SocioController@listar');
Route::post('/cadastrar', 'SocioController@cadastrar');
Route::post('/enviar', 'SocioController@enviar');

});


//////

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
