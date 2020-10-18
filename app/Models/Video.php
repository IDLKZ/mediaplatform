<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;


    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }


    protected $fillable = ["course_id","available","first","count","video_url","title","description","alias"];


    public function course(){
        return $this->belongsTo(Course::class,"course_id","id");
    }



    public static function saveData($request){
        $video = new self();
        $fill = $request->all();
        $file = $request->file("video_url");
        $fill["available"] = $request->has("available") ? 1 :0;
        $name = Str::random(10) . "." . $file->getClientOriginalExtension();
        Storage::disk("videos")->putFileAs("/upload/videos/", $file,$name);
        $fill["video_url"] = "/upload/videos/".$name;
        $video->fill($fill);
        return($video->save());
    }
    public static function updateData($request,$video){
        $fill = $request->all();
        $fill["available"] = $request->has("available") ? 1 :0;
        if($request->hasFile("video_url")){
            $file = $request->file("video_url");
            if(Storage::disk("videos")->exists($video->video_url)){
                Storage::disk("videos")->delete($video->video_url);
            }
            $name = Str::random(10) . "." . $file->getClientOriginalExtension();
            Storage::disk("videos")->putFileAs("/upload/videos/", $file,$name);
            $fill["video_url"] = "/upload/videos/".$name;
        }

        $video->update($fill);
        return($video->save());
    }




}
