<?php namespace App\CustomStuff\CustomDirectory;

use App\CustomStuff\CustomDirectory\WavFile;
class RevertSignature {
   public static function  Revert_Signature_Song($filename){
        $wavFile = new WavFile;
        $fileName= '../public/audios/'.$filename;
        $tmp = $wavFile->ReadFile($fileName);
        //Get binary code of signature
        $subchunk3data = unpack("H*", $tmp['subchunk3']['data']);
        $signature = "";
        for($i = 0; $i < 80; $i++){
            $signature .= substr(str_pad(base_convert(substr($subchunk3data[1], $i*2, 2), 16, 2), 8, '0', STR_PAD_LEFT), 7, 1);
        }
        $lenofsigndat = BintoText(substr($signature, 0, 80));
        if (is_numeric($lenofsigndat)){
            for($i = 80; $i < 80+$lenofsigndat*8; $i++){
                $signature .= substr(str_pad(base_convert(substr($subchunk3data[1], $i*2, 2), 16, 2), 8, '0', STR_PAD_LEFT), 7, 1);
            }
            return $signdat = BintoText(substr($signature, 80, $lenofsigndat*8));
        }
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