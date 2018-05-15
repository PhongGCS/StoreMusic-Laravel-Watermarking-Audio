<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public function get_List_Song(){
        $first_song_active = \DB::table('song')->take(1)->get();
        $list_song = \DB::table('song')->get();
        return view('index',['list_song' => $list_song, 'first_song' => $first_song_active]);
    }
    function validate_User_By_Session(){
        echo "kiem tra user hop he hay khong";
    }
}
