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

Route::get('/', function () { return view('welcome');});
//Aqui eu trato o crud do Curso
Route::get('/cursos', 'CursosController@index')->name("cursos");
Route::post('/cursos/cadastrar', 'CursosController@store');
Route::get('/cursos/edit/{id}', 'CursosController@edit')->name("edit");
Route::get('/cursos/apagar/{id}', 'CursosController@destroy')->name("apagar");
Route::post('/cursos/atualizar', 'CursosController@update');

//Aqui eu trato o crud do Aluno
Route::get('/alunos', 'AlunosController@index')->name("alunos");
Route::post('/alunos/cadastrar', 'AlunosController@store');
Route::get('/alunos/edit/{id}', 'AlunosController@edit')->name("editar");
Route::post('/alunos/atualizar', 'AlunosController@update');
Route::get('/alunos/apagar/{id}', 'AlunosController@destroy')->name("deletar");
Route::post('/alunos/buscar', 'AlunosController@buscar');

//Aqui eu trato o crud do Matrículas
Route::get('/matriculas', 'MatriculasController@index')->name("matriculas");
Route::post('/matriculas/cadastrar', 'MatriculasController@store');
Route::get('/matriculas/edit/{id}', 'MatriculasController@edit')->name("ed");
Route::post('/matriculas/atualizar', 'MatriculasController@update');
Route::get('/matriculas/apagar/{id}', 'MatriculasController@destroy')->name("remover");
Route::post('/matriculas/buscar', 'MatriculasController@buscar');
