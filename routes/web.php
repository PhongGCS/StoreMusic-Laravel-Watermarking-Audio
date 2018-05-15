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


Route::get('/', 'Index@get_List_Song')->name("index_page");

Route::post('login', 'Login@checkLogin')->name('Login');

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/songDetail/{id}', 'SongDetail@get_Song');

Route::get('/BuySong/{id}', 'BuySong@get_Song')->middleware(["Normal_user","Admin_user"]);
