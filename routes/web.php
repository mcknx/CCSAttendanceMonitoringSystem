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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', function () {
//     return view('professor');
// });

// Route::get('/', 'TestController@index');

// Professors
Route::get('/professor',"ProfessorController@index") ;
Route::get('/searchProfessor',"ProfessorController@search") ;
Route::get('/professorEdit/{id}',"ProfessorController@edit") ;
Route::get('/professorShow/{id}',"ProfessorController@show") ;
Route::get('/professorCreate',"ProfessorController@create") ;
Route::post('/professorStore',"ProfessorController@store") ;
Route::post('/professorUpdate/{id}',"ProfessorController@update") ;

// Subjects
Route::get('/subject',"SubjectController@index") ;
Route::get('/searchSubject',"SubjectController@search") ;
Route::get('/subjectEdit/{id}',"SubjectController@edit") ;
Route::get('/subjectShow/{id}',"SubjectController@show") ;
Route::get('/subjectCreate',"SubjectController@create") ;
Route::post('/subjectStore',"SubjectController@store") ;
Route::post('/subjectUpdate/{id}',"SubjectController@update") ;