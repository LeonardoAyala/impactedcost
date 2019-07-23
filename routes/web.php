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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index_v2', function () {
    return view('empact_v2.index');
});

Route::get('/forms_v2', function () {
    return view('empact_v2.forms');
});

Route::get('/login_v2', function () {
    return view('empact_v2.login');
});

Route::get('/register_v2', function () {
    return view('empact_v2.register');
});

Route::resource('environment_v2', 'EnvironmentControllerV2');
Route::get('/home_v2', 'HomeController@index_v2');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('environment', 'EnvironmentController');

Route::resource('environment.project', 'ProjectController', [
    'except' => ['index', 'show', 'create']
]);

Route::resource('environment.report', 'ReportController');

Route::POST('environment/{environment}/report/addDay','DayController@store');
Route::POST('environment/{environment}/report/editDay','DayController@update');
Route::POST('environment/{environment}/report/deleteDay','DayController@destroy');
Route::POST('environment/{environment}/report/selectDay','DayController@select');

Route::POST('environment.report/addReport','ReportController@add');
Route::POST('environment/editReport','ReportController@change');
Route::POST('environment/deleteReport','ReportController@delete');

Route::POST('environment/editJoin','JoinController@change');
Route::POST('environment/deleteJoin','JoinController@delete');

Route::POST('environment/addProject','ProjectController@add');
Route::POST('environment/editProject','ProjectController@change');
Route::POST('environment/deleteProject','ProjectController@delete');

Route::POST('addEnvironment','EnvironmentController@add');
Route::POST('editEnvironment','EnvironmentController@change');
Route::POST('deleteEnvironment','EnvironmentController@delete');
Route::POST('joinEnvironment','EnvironmentController@join');

Route::resource('post','PostController');
Route::POST('addPost','PostController@addPost');
Route::POST('editPost','PostController@editPost');
Route::POST('deletePost','PostController@deletePost');
