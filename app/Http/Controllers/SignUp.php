<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class SignUp extends Controller
{
    function Sign_up(Request $request){

        $name =  $request['name'];
        $email =  $request['email'];
        $password =  $request['password'];
        DB::table('users')->insert([
        'name' => $name,
        'Monney' => 0,
        'email' => $email,
        'password' => bcrypt($password),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
        ]);

        if ( Auth::attempt(['email' => $email, 'password' => $password]) ){
            return redirect()->route('index_page');
        }
        return redirect()->route('index_page');
        
        
    }

}
