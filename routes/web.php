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
//     return view('welcome');
// });

Auth::routes();
Route::get('/','GroupController@index')->middleware('auth');
Route::get('group/create', 'GroupController@add')->middleware('auth');
Route::post('group/create', 'GroupController@create')->middleware('auth');
// Route::get('comment/show/{id}', ['as' => 'comment.show', 'uses' => 'CommentController@show'])->middleware('auth');
// Route::get('comment/show/{id}', 'CommentController@show')->middleware('auth');
// Route::post('comment/{id}', 'CommentController@create')->middleware('auth');
// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('comments', 'CommentController');






// Route::get('comment/show/{id}', 'CommentController@show')
//      ->where(['id' => '[0-9]+'])->middleware('auth');

// Route::post('comment/show/{id}', 'CommentController@create')
//      ->where(['id' => '[0-9]+'])->middleware('auth');


