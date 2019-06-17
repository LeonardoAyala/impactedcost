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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('environment', 'EnvironmentController');

Route::resource('environment.project', 'ProjectController');

Route::resource('environment.report', 'ReportController');



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
