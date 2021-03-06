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

Route::group(['prefix' => 'pessoas'], function () {
    Route::get('/', function (){
        return redirect('/pessoas/a');
    });
    Route::get('/novo', 'PessoasController@cadastroView');
    Route::get('/{id}/editar', 'PessoasController@editarView');
    Route::get('/{id}/excluir', 'PessoasController@excluirView');
    Route::get('/{id}/destroy', 'PessoasController@destroy');
    Route::post('/store', 'PessoasController@store');
    Route::post('/update', 'PessoasController@update');
    Route::post('/update', 'PessoasController@update');
    Route::post('/busca', 'PessoasController@buscar');
    Route::get('/{letra}', 'PessoasController@index');
});

