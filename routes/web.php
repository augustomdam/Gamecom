<?php

Route::get('/', 'publica\HomeController@index')->name('home.public');
Route::group(['prefix' => 'disciplina'], function () {
    Route::get('/{disciplina}', 'publica\HomeController@detalhe')->name('disciplina.detalhe');
    Route::get('/{disciplina}/fases', 'publica\FasesController@index')->name('disciplina.fases');
    Route::get('/{disciplina}/fases/{fase}', 'publica\FasesController@show')->name('fase.show');
    Route::get('/{disciplina}/medalhas', 'publica\MedalhaController@index')->name('disciplina.medalhas');
    Route::get('/{disciplina}/gamificacao', 'publica\GamificacaoController@index')->name('disciplina.gamificacao');
    Route::get('/{disciplina}/ranking', 'publica\PontuacaoController@index')->name('disciplina.ranking');
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
    Route::post('matriculas/buscar', 'MatriculaController@buscar')->name('matricula.buscar');
    //crud pontuacaos
    Route::resource('pontuacaos', 'PontuacaoController');
    Route::post('pontuacaos/buscar', 'PontuacaoController@buscar')->name('pontuacao.buscar');
    //crud funções
    Route::resource('funcaos', 'FuncaosController')->middleware('can:create, App\Funcao');
    //users
    Route::get('users/list', 'UserController@list')->name('user.list')->middleware('can:create, App\User');
    Route::get('user/profile', 'UserController@profile')->name('user.profile');
    Route::get('user/edit/{user}', 'UserController@profileEdit')->name('user.edit');
    Route::put('user/{user}', 'UserController@profileUpdate')->name('user.update');
    //users-funcaos
    Route::get('funcao/user/{user}', 'UserController@atribuirFuncao')->name('user.atribuir')->middleware('can:create, App\User');
    Route::post('funcao/user', 'UserController@atribuiFuncao')->name('user.atribuiFuncao')->middleware('can:create, App\User');
    Route::delete('user/{user}/funcao/{funcao}', 'UserController@deleteFuncao')->name('user.deleteFuncao')->middleware('can:create, App\User');

});
