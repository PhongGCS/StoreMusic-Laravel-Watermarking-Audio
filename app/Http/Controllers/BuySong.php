<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Respose;
use Illuminate\Support\Facades\Auth;
use App\CustomStuff\CustomDirectory\WavFile;
use App\CustomStuff\CustomDirectory\Signature;


ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');

class BuySong extends Controller
{
    //
    function song_table(){
        return view('song_table',['listsong'=> $this->get_List_Song()]);
    }

    function check_buy_song($id){
        $song = \DB::table('song')->where('id', $id)->get();

        if( sizeof($song) != 1 ){
            return false;
        }
        $user = Auth::user();

        if( $user->Monney >= $song[0]->Price ){
            return true;            
        }
        else{
            return false;
        }
        return false;
    }

    function signtature_song($id){
        if ( $this->check_buy_song($id) ){
            $url = "";
            $file_song = new WavFile();
            $song = \DB::table('song')->where('id', $id)->get();
            $song_name = $song[0]->filename;
            $result = Signature::signature_Song( $song_name, Auth::user()->name);
            if($result){
                return view('signtature_song',['url_download'=> $result, 'error'=>false]);
            }
        }
        return view('index_page');
    }

    public function get_List_Song(){
        return \DB::table('song')->get();
    }
}
