<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadSong extends Controller
{
    function index (){
        return view('uploadsong');
    }
}
