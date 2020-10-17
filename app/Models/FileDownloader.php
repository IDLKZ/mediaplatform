<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FileDownloader extends Model
{
    use HasFactory;


    public static function saveFile($path,$request,$name){
        $filepath = null;
        if($request->hasFile($name)){
            $file = $request->file($name);
            $filename = Str::random(16).time()."." .$file->getClientOriginalExtension();
            if($file->storeAs($path,$filename)){
                $filepath = $path.$filename;
            };
        }
        return $filepath;

    }







}
