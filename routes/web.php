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

Auth::routes();

//トップページ アプリ説明
Route::get('/','GroupController@top');

//グループ一覧画面
Route::get('/groups','GroupController@index')->middleware('auth');

//グループ新規作成画面
Route::get('groups/create', 'GroupController@add')->middleware('auth');
Route::post('groups/create', 'GroupController@create')->middleware('auth');

//グループチャットからExit
Route::get('groups/{group_id}/delete', 'GroupController@delete')->middleware('auth');

//グループチャット詳細画面
// 詳細画面と投稿画面は同じViewの内容を使用
Route::get('groups/{group_id}/', 'GroupController@show')->middleware('auth');

//グループチャット投稿
Route::post('groups/{group_id}/comments/create', 'CommentController@create')->middleware('auth');

