<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', ['as' => 'home_index', 'uses' => 'BlogController@index']);
//
//Route::get('home/{id}', ['as' => 'home_show', 'uses' => 'HomeController@show']);
//
//Route::get('second', ['as' => 'second_page', 'uses' => 'HomeController@secondPage']);
//
//Route::get('grade', ['as' => 'grade_form', 'uses' => 'HomeController@gradeForm']);
//Route::post('calculate', ['as' => 'grade_calculate', 'uses' => 'HomeController@gradeCalculate']);

// --- Blog ---
Route::get('/', ['as' => 'blog_index', 'uses' => 'BlogController@index']);
Route::get('category/{id}', ['as' => 'category_index', 'uses' => 'BlogController@category']);
Route::get('blog/{id}', ['as' => 'blog_show', 'uses' => 'BlogController@show']);

Route::get('blog/new/edit', ['as' => 'blog_create', 'uses' => 'BlogController@create']);
Route::post('blog/new/edit', ['as' => 'blog_store', 'uses' => 'BlogController@store']);

Route::get('blog/{id}/edit', ['as' => 'blog_edit', 'uses' => 'BlogController@edit']);
Route::put('blog/{id}/edit', ['as' => 'blog_update', 'uses' => 'BlogController@update']);

Route::delete('blog/{id}', ['as' => 'blog_delete', 'uses' => 'BlogController@destroy']);