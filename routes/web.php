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
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/registerUser', 'UserController@register')->name('registerUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
