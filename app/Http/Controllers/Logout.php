<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Logout extends Controller
{
    public function index(){
        Auth::logout();
        return redirect()->route('index_page');
    }
}
