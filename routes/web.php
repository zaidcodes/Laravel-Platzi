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
    $links = [
        'https://github.com/zaidcodes'=>'Github',
        'https://twitter.com/zaidcodes'=>'Instagram',
        'https://instagram.com/zaidcodes'=>'Twitter',
        'https://platzi.com/@zaidcodes'=>'Platzi'
    ];
    return view('welcome',[
        'teacher' => 'Guido Contreras Woda',
        'links' => $links
    ]);
});
Route::get('/about', function () {
    return view('about');
});
