<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Materials extends Model
{
    use HasFactory;


    protected $fillable =["video_id","author_id","title","links","file","type"];

    protected $casts = [
        "links"=>"array"
    ];

    public function video(){
        return $this->belongsTo(Video::class,"video_id","id");
    }
    public function author(){
       return $this->belongsTo(User::class,"author_id","id");
    }



    public static function saveMaterial($request){
        $fill = $request->all();
        if($request->hasFile("file")){
            $file = $request->file("file");
            $name = Str::slug($request->get("title")). Str::random(5) . "." . $file->getClientOriginalExtension();
            Storage::disk("materials")->putFileAs("/upload/materials/", $file,$name);
            $fill["file"] = "/upload/materials/". $name;
        }
        if (Auth::user()->role_id == 2){$fill["author_id"] = Auth::id();}
        else{
            $video = Video::find($request->get("video_id"));
            $fill["author_id"] = $video->course->author_id;
        }

        $material = new self();
        $material->fill($fill);
        return $material->save();

    }
    public static function updateMaterial($request,$material){
        $fill = $request->all();
        if($request->hasFile("file")){
            $file = $request->file("file");
            $name = Str::slug($request->get("title")). Str::random(5) . "." . $file->getClientOriginalExtension();
            Storage::disk("materials")->putFileAs("/upload/materials/", $file,$name);
            $fill["file"] = "/upload/materials/". $name;
        }
        $material->update($fill);
        return $material->save();

    }






}
