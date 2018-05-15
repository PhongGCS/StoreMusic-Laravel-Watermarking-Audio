<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
