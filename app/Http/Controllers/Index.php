<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public function get_List_Song(){
        echo "Thuc hien query va lay ra list bai hat";
        return view('index');
    }
    function validate_User_By_Session(){
        echo "kiem tra user hop he hay khong";
    }
}
