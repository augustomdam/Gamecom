<?php

use App\Disciplina;
//home page
Route::get('/', function () {
    return view('welcome');
});
//autenticaçao
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['verified']], function () {
    //home user logado
    Route::get('/home', 'HomeController@index')->name('home');
    //crud disciplinas
    Route::resource('disciplinas','DisciplinaController');
    Route::resource('paginas','PaginaController');
});
