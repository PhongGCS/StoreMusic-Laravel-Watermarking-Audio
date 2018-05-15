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


Route::get('/', 'Index@index')->name("index_page");

Route::post('login', 'Login@checkLogin')->name('Login');

Route::get('/signup', function () {
    return view('signup');
});

Route::get('songDetail/{id}', 'SongDetail@get_Song');

Route::get('BuySong', 'BuySong@song_table')->middleware(['Normal_user']);

Route::get('BuySong/{id}', 'BuySong@signtature_song')->middleware(['Normal_user'])->where(['so' => '[0-9]']);

Route::get('logout','Logout@index')->name('logout');
Route::get('RevertSignature', 'RevertSignatureSong@index')->middleware(['Normal_user']);

