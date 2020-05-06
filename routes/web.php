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
//マイページ
Route::get('myplan', 'KnowledgesController@myplan');
Route::get('requestplan', 'KnowledgesController@requestplan');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});

Route::post('request_plan','Request_plansController@store')->name('request_plan.store');
Route::post('myplan','Request_plansController@receive')->name('request_plan.receive');
//チャット
Route::get('chat.request','ChatsController@request')->name('chat.request');
Route::get('chat.myplan','ChatsController@myplan')->name('chat.myplan');
Route::post('chat.submit','ChatsController@submit')->name('chat.submit');
Route::post('chat.receive','ChatsController@receive')->name('chat.receive');