<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadSong extends Controller
{
    function index (){
        return view('uploadsong');
    }
    function postSong(Request $request){
        if($request->has('name_song') && $request->has('price_song') && $request->hasFile('file_song')){
            $name_song = $request->input('name_song'); 
            $price_song = (int) $request->input('price_song'); 
            $file_song = $request->file('file_song');
            var_dump($file_song->getClientOriginalExtension('file_song'));
            if( $file_song->getClientOriginalExtension('file_song') == 'wav'){
                //$file_song->move('audios/', $namefile);
                $path = Storage::putFile('audios', $file_song);
                $namefile = explode("/", $path);
                $name = explode(".", $namefile[1]);
                $name = $name[0];
                $contents = Storage::get($path);
                Storage::cloud()->put($namefile[1], $contents);
                Storage::delete($path);
                $path_driver = $this->get_upload_path($name);
                var_dump($path_driver);
                if( $path_driver ){
                    \DB::table('song')->insert([
                        'name' => $name_song,
                        'Price' => $price_song,
                        'image' => '',
                        'filename' => $path_driver,
                        'created_at' => \Carbon\Carbon::now(),
                        ]);
                    echo "insert thanh cong";
                }
                return view('success_upload_song',['error'=>true]);
            }
            return view('success_upload_song',['error'=>false]);
        }
        return view('success_upload_song',['error'=>false]);

    }
    function get_upload_path($filename){
        $contents = collect(Storage::cloud()->listContents('/', false));
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->first(); 
        if($file){
            return $file['path'];
        }
        return false;
    }
}
