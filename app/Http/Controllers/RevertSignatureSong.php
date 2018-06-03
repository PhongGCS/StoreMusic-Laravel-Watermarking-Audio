<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');

use Illuminate\Http\Request;
use App\CustomStuff\CustomDirectory\WavFile;
use App\CustomStuff\CustomDirectory\RevertSignature;
use Illuminate\Support\Facades\Storage;

class RevertSignatureSong extends Controller
{
    function index1(){
        $filename = 'Buy-2018-06-03-23-24-34-1KFAj2-qAC65pwlh-AL6WjYyNYRyYEq8B.wav';
        $result = RevertSignature::Revert_Signature_Song($filename);
        if( $result ){
            return view('revert_signtature_song',['result'=>$result]);
        }
    }
    function index(){
            return view('revert_signtature_song');
    }

    function postSong(Request $request){
        if ($request->hasFile('file_song')){
            $file_song = $request->file('file_song');
            if( $file_song->getClientOriginalExtension('file_song') == 'wav'){
                $path = Storage::putFile('audios', $file_song);

                $result = RevertSignature::Revert_Signature_Song($path);
                if( $result ){
                    Storage::delete($path);
                    return view('revert_signtature_song',['result'=>$result]);
                }
                Storage::delete($path);
                
            }
        }else{
            return redirect()->route('index_page');            
        }
        return redirect()->route('index_page');        
    }
}
