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
    //crud paginas
    Route::resource('paginas','PaginaController');
    //crud gamificacaos
    Route::resource('gamificacaos', 'GamificacaoController');
    //crud medalhas
    Route::resource('medalhas', 'MedalhaController');
    //crud equipes
    Route::resource('equipes', 'EquipeController');
    //crud fases
    Route::resource('fases', 'FaseController');
    //crud matriculas
    Route::resource('matriculas', 'MatriculaController');
    //crud pontuacaos
    Route::resource('pontuacaos', 'PontuacaoController');
    //users
    Route::get('users/list', 'UserController@list');
    Route::get('user/profile', 'UserController@profile');

});
