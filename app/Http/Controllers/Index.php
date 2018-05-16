<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class Index extends Controller
{
    public function get_First_Song(){
        return \DB::table('song')->take(1)->get();
    }
    public function get_List_Song(){
        return \DB::table('song')->get();
    }
    public function index(){
        return view('index',['list_song' => $this->get_List_Song(), 'first_song' => $this->get_First_Song()]);
    }
    
    function validate_User_By_Session(){
        echo "kiem tra user hop he hay khong";
    }

    public function index_fromDriver(){
        $list_song_json = $this->get_list_song_from_Driver();
        $list_song = json_decode($list_song_json);
        $first_song = $list_song[0];
        return view('index',['list_song' => $list_song, 'first_song' => $first_song]);
    }
    function get_list_song_from_Driver(){
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        //return $contents->where('type', '=', 'dir'); // directories
        return $contents->where('type', '=', 'file'); // files
    }


}
