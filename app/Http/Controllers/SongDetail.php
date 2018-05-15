<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongDetail extends Controller
{
    function get_Song($id){
        echo "chay song detail voi id: ". $id;
    }
}
