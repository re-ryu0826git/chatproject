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

//グループ一覧画面
Route::get('/','GroupController@index')->middleware('auth');

//グループ新規作成画面
Route::get('groups/create', 'GroupController@add')->middleware('auth');
Route::post('groups/create', 'GroupController@create')->middleware('auth');

//グループチャット画面
Route::get('groups/{group_id}/comments', 'CommentController@index')->middleware('auth');

//グループチャット投稿
Route::post('groups/{group_id}/comments/create', 'CommentController@create')->middleware('auth');



