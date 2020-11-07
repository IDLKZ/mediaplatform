<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileDownloader extends Model
{
    use HasFactory;


    public static function saveFile($path,$request,$name,$oldFile = null){
        $filepath = $oldFile;
        if($request->hasFile($name)){
            if($oldFile){Storage::delete($oldFile);};
            $file = $request->file($name);
            $filename = Str::random(16).time()."." .$file->getClientOriginalExtension();
            if($file->storeAs($path,$filename)){
                $filepath = $path.$filename;
            };
        }
        return $filepath;
    }

    public static function deleteFile($file){
        if(Storage::exists($file)){Storage::delete($file);}
    }










}
