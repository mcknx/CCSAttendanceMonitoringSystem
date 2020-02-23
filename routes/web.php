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
//     return view('');
// });

// Route::get('/', 'TestController@index');

Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration'); 
Route::get('dashboard', 'AuthController@dashboard'); 
Route::get('logout', 'AuthController@logout');

// Professors
Route::get('/',"ProfessorController@index") ;
Route::get('/professor',"ProfessorController@index") ;
Route::get('/professorEdit/{id}',"ProfessorController@edit") ;
Route::get('/professorShow/{id}',"ProfessorController@show") ;
Route::get('/professorCreate',"ProfessorController@create") ;
Route::post('/professorStore',"ProfessorController@store") ;
Route::post('/professorUpdate/{id}',"ProfessorController@update") ;
Route::post('/professorDelete/{id}',"ProfessorController@destroy") ;

// Subjects
Route::get('/subject',"SubjectController@index") ;
Route::get('/subjectEdit/{id}',"SubjectController@edit") ;
Route::get('/subjectShow/{id}',"SubjectController@show") ;
Route::get('/subjectCreate',"SubjectController@create") ;
Route::post('/subjectStore',"SubjectController@store") ;
Route::post('/subjectUpdate/{id}',"SubjectController@update") ;
Route::post('/subjectDelete/{id}',"SubjectController@destroy") ;

//record
Route::get('/record',"RecordController@index") ;
Route::get('/recordEdit/{id}',"RecordController@edit") ;
Route::get('/recordShow/{id}',"RecordController@show") ;
Route::get('/recordCreate',"RecordController@create") ;
Route::post('/recordStore',"RecordController@store") ;
Route::post('/recordUpdate/{id}',"RecordController@update") ;
Route::post('/recordDelete/{id}',"RecordController@destroy") ;

//session
Route::get('/session',"SessionController@index") ;
Route::get('/sessionEdit/{id}',"SessionController@edit") ;
Route::get('/sessionShow/{id}',"SessionController@show") ;
Route::get('/sessionCreate',"SessionController@create") ;
Route::post('/sessionStore',"SessionController@store") ;
Route::post('/sessionUpdate/{id}',"SessionController@update") ;
Route::post('/sessionDelete/{id}',"SessionController@destroy") ;