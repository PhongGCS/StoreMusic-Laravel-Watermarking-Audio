<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');

use Illuminate\Http\Request;
use App\CustomStuff\CustomDirectory\WavFile;
use App\CustomStuff\CustomDirectory\RevertSignature;

class RevertSignatureSong extends Controller
{
    function index(){
        $filename = 'Buy-2018-05-16-06-42-35-Doi-Day-Toi-Only-C.wav';
        $result = RevertSignature::Revert_Signature_Song($filename);
        if( $result ){
            return view('revert_signtature_song',['result'=>$result]);
        }
    }
}
