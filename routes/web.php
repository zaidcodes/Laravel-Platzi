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

Route::get('/messages/{message}','MessagesController@show');
Route::post('/messages/create','MessagesController@create')
->middleware('auth');
Auth::routes();

Route::get('/','PagesController@home');

Route::get('/{username}/follows','UsersController@follows');
Route::post('/{username}/follow','UsersController@follow')
->middleware('auth');
Route::post('/{username}/unfollow','UsersController@unfollow')
->middleware('auth');
Route::get('/{username}','UsersController@show');

