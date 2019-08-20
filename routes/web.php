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

//Home & Welcome
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/', 'HomeController@welcome');

//Auth routes
Auth::routes();


////////High Priorities

//Environment routes
Route::resource('environment', 'EnvironmentController');
Route::post('environment/get/{id}', 'EnvironmentController@get');
Route::post('environment/join', 'EnvironmentController@join');
Route::post('environment/delete/{id}', 'EnvironmentController@delete');

//Project routes
Route::resource('environment.project', 'ProjectController');

//Report routes
Route::resource('environment.report', 'ReportController');

//Set routes
Route::resource('environment.set', 'SetController');

//ProjectCategories routes
Route::resource('environment.project_category', 'ProjectCategoryController');

//Roles routes

//Task routes

//Reports routes

//Activities routes

//Cousers routes


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
