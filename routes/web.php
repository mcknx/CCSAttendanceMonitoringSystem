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
Route::get('pdf', 'PdfController@show')->middleware('auth');
Route::post('importProfExcel', 'AuthController@professorImport')->middleware('auth');
Route::get('exportProfExcel', 'AuthController@professorExport')->middleware('auth');

// Login
Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@index']);
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration'); 

// Admin Dashnoard
Route::get('dashboard', 'AuthController@dashboard')->middleware('auth');
Route::get('logout', 'AuthController@logout');

// User Dashboard
Route::get('userdashboard', 'UserDashboardController@index')->middleware('auth'); 

// Professors
Route::get('/',"ProfessorController@index")->middleware('auth') ;
Route::get('/professor',"ProfessorController@index")->middleware('auth') ;
Route::get('/professorEdit/{id}',"ProfessorController@edit")->middleware('auth') ;
Route::get('/professorShow/{id}',"ProfessorController@show")->middleware('auth') ;
Route::get('/professorCreate',"ProfessorController@create")->middleware('auth') ;
Route::post('/professorStore',"ProfessorController@store")->middleware('auth') ;
Route::post('/professorUpdate/{id}',"ProfessorController@update")->middleware('auth') ;
Route::post('/professorDelete/{id}',"ProfessorController@destroy")->middleware('auth') ;

// Subjects
Route::get('/subject',"SubjectController@index")->middleware('auth') ;
Route::get('/subjectEdit/{id}',"SubjectController@edit")->middleware('auth') ;
Route::get('/subjectShow/{id}',"SubjectController@show")->middleware('auth') ;
Route::get('/subjectCreate',"SubjectController@create")->middleware('auth') ;
Route::post('/subjectStore',"SubjectController@store")->middleware('auth') ;
Route::post('/subjectUpdate/{id}',"SubjectController@update")->middleware('auth') ;
Route::post('/subjectDelete/{id}',"SubjectController@destroy")->middleware('auth') ;

//record
Route::get('/record',"RecordController@index")->middleware('auth') ;
Route::get('/recordEdit/{id}',"RecordController@edit")->middleware('auth') ;
Route::get('/recordShow/{id}',"RecordController@show")->middleware('auth') ;
Route::get('/recordCreate',"RecordController@create")->middleware('auth') ;
Route::post('/recordStore',"RecordController@store")->middleware('auth') ;
Route::post('/recordUpdate/{id}',"RecordController@update")->middleware('auth') ;
Route::post('/recordDelete/{id}',"RecordController@destroy")->middleware('auth') ;

//session
Route::get('/session',"SessionController@index")->middleware('auth') ;
Route::get('/sessionEdit/{id}',"SessionController@edit")->middleware('auth') ;
Route::get('/sessionShow/{id}',"SessionController@show")->middleware('auth') ;
Route::get('/sessionCreate',"SessionController@create")->middleware('auth') ;
Route::post('/sessionStore',"SessionController@store")->middleware('auth') ;
Route::post('/sessionUpdate/{id}',"SessionController@update")->middleware('auth') ;
Route::post('/sessionUpdateRemarks/{id}',"SessionController@updateRemarks")->middleware('auth') ;
Route::post('/sessionUpdateRemarksByUser/{id}',"SessionController@updateRemarksByUser")->middleware('auth') ;
Route::post('/sessionDelete/{id}',"SessionController@destroy")->middleware('auth') ;
Route::get('/showSessionData/{id}',"SessionController@showSessionData")->middleware('auth') ;
Route::get('/showUserData/{id}',"SessionController@showUserData")->middleware('auth') ;

//Activity Request
Route::post('/storeRequest/{prof_code}', "ActivityRequestController@store")->middleware('auth') ;
Route::get('/showActivityRequest/{id}', "ActivityRequestController@show")->middleware('auth') ;
Route::post('/editActivityRequest/{id}', "ActivityRequestController@edit")->middleware('auth') ;
Route::get('/deleteActivityRequest/{id}', "ActivityRequestController@destroy")->middleware('auth') ;