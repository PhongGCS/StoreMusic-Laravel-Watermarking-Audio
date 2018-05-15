<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public function get_List_Song(){
        $data = \DB::table('song')->get();
        return view('index',['list_song'=>$data]);
    }
    function validate_User_By_Session(){
        echo "kiem tra user hop he hay khong";
    }
}
