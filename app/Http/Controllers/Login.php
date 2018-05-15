<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    function checkLogin(Request $request){
        $email =  $request['email'];
        $password = $request['password'];
        if ( Auth::attempt(['email' => $email, 'password' => $password]) ){
            return view('buy_song');
        }else{
            return redirect()->route('index_page');
        }

    }
}
