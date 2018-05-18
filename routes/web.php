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
use App\CustomStuff\CustomDirectory\WavFile;
ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');


Route::get('/', 'Index@index_fromDriver')->name("index_page");

Route::post('login', 'Login@checkLogin')->name('Login');

Route::get('/signup', function () {
    return view('signup');
});

Route::get('songDetail/{id}', 'SongDetail@get_Song');

Route::get('BuySong', 'BuySong@song_table')->middleware(['Normal_user']);

Route::get('BuySong/{id}', 'BuySong@signtature_song')->middleware(['Normal_user'])->where(['so' => '[0-9]']);

Route::get('logout','Logout@index')->name('logout');

Route::get('UploadSong','UploadSong@index')->name('Uploadsong')->middleware(['Normal_user', 'Admin_user']);

Route::post('UploadSong','UploadSong@postSong')->name('PostSong')->middleware(['Normal_user', 'Admin_user']);

Route::get('RevertSignature', 'RevertSignatureSong@index')->middleware(['Normal_user']);

// Route Put SOng item from google API
Route::get('put-existing/{filename}', function($filename) {
    $fileName= '../public/audios/'.$filename;;
    $fileData = File::get($fileName);
    Storage::cloud()->put($filename, $fileData);
    return 'File was saved to Google Drive';
});

// Route get list item from google API
Route::get('list', function() {
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    //return $contents->where('type', '=', 'dir'); // directories
    return $contents->where('type', '=', 'file'); // files
})->name("get_list");

// route permision google drive API
Route::get('share', function() {
    $filename = 'test.txt';
    // Store a demo file
    Storage::cloud()->put($filename, 'Hello World');
    // Get the file to find the ID
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // there can be duplicate file names!
    // Change permissions
    $service = Storage::cloud()->getAdapter()->getService();
    $permission = new \Google_Service_Drive_Permission();
    $permission->setRole('reader');
    $permission->setType('anyone');
    $permission->setAllowFileDiscovery(false);
    $permissions = $service->permissions->create($file['basename'], $permission);
    return Storage::cloud()->url($file['path']);
});

