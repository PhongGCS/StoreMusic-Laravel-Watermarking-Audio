<?php namespace App\CustomStuff\CustomDirectory;
use Illuminate\Support\Facades\Storage;
use App\CustomStuff\CustomDirectory\WavFile;

class Signature {
   public static function  signature_Song($filename,$username){
        //Dowload file    
        downloadFile($filename);
        $datetime = new \DateTime();
        $date = $datetime->format('Y-m-d-H-i-s');
        $wavFile = new WavFile;
        $tmp = $wavFile->ReadFile('../storage/app/audios/'.$filename.'_Download.wav');
        $mess =  $username."-".$filename."-DoKhacPhong-".$date;
        $signature = TexttoBin(str_pad(strlen($mess), 10, '0', STR_PAD_LEFT) . $mess);
        //Change bit
        $subchunk3data = unpack("H*", $tmp['subchunk3']['data']);
        if (strlen($subchunk3data[1]) >= strlen($signature)){
            for($i = 0; $i < strlen($signature); $i++){
                $newhex = str_pad(dechex(bindec(substr_replace(str_pad(hex2bin(substr($subchunk3data[1], $i*2, 2)), 8, '0', STR_PAD_LEFT), substr($signature, $i, 1), 7, 1))), 2, '0', STR_PAD_LEFT);
                $subchunk3data[1] = substr_replace($subchunk3data[1], $newhex, $i*2, 2);
            }
            $tmp['subchunk3']['data'] = pack("H*", $subchunk3data[1]);
            //Write new audio file
            $newFileName = "Buy-".$date."-".$filename;
            $wavFile->WriteFile($tmp, "../public/audios/" . $newFileName);
            unlink('../storage/app/audios/'.$filename.'_Download.wav');
            // Xoa trong 5 phut.
            if (file_exists("../public/audios/" . $newFileName)){

                return $newFileName;
            }
            return false;
        }
        echo "your message is short";
        return false;
   }
}
 function TexttoBin($text){
    $bin = "";
    for($i = 0; $i < strlen($text); $i++)
        $bin .= str_pad(decbin(ord($text[$i])), 8, '0', STR_PAD_LEFT);
    return $bin;
}
 function BintoText($bin){
    $text = "";
    for($i = 0; $i < strlen($bin)/8 ; $i++)
        $text .= chr(bindec(substr($bin, $i*8, 8)));
    return $text;
}


function downloadFile ($path){
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    //var_dump($contents);
    $file = $contents
        ->where('type', '=', 'file')
        ->where('path', '=', $path)
        ->first(); // there can be duplicate file names!
    //return $file; // array with file info
    //var_dump($file);
    if(!$file){
        echo "Your file have problem.";
        die();
    }
    $readStream = Storage::cloud()->getDriver()->readStream($file['path']);
    $targetFile = storage_path('app/audios/'.$path."_Download.wav");
    file_put_contents($targetFile, stream_get_contents($readStream), FILE_APPEND);
}