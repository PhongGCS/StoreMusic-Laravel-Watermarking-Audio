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

Route::get('/', 'Index@get_List_Song');

Route::get('/login', function () {
    return view('login');
});


Route::get('/signup', function () {
    return view('signup');
});

Route::get('/songDetail/{id}', 'SongDetail@get_Song');


Route::get('/database',function(){
    Schema::create('baihat', function($table){
        $table->increments('id');
        $table->string('name',200);
        $table->string('filename',200);
    });
    echo "Tạo bảng xong";
});
