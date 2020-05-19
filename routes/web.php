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


Route::get('/', 'KnowledgesController@index');
Route::resource('knowledges', 'KnowledgesController');

//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post'); 
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
//マイページ表示
Route::get('mypage', 'KnowledgesController@mypage')->name('mypage');

//リクエスト
 //リクエスト送信する
Route::post('request_plan','RequestPlansController@store')->name('request_plan.store');
 //リクエストを承認する
Route::post('myplan','RequestPlansController@receive')->name('request_plan.receive');
//チャット
 //メッセージ一覧表示
Route::get('chat.index/{id}','ChatsController@getChatList')->name('chat.index');
 //メッセージを送信する
Route::post('chat.submit','ChatsController@submit')->name('chat.submit');
