<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ["author_id","language_id","img","title","subtitle","description","advantage","requirement","status","alias"];

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

    protected $casts=[
      "advantage"=>"array",
        "status"=>"integer"
    ];

    public static function saveData($request){
        $course = new self();
        $fill = $request->all();
        $teacher = Auth::user();
        $fill["status"] = $request->has("status") ? 1 : 0;
        $fill["author_id"] = $teacher->id;
        $fill["img"] = FileDownloader::saveFile("/upload/course/",$request,"img");
        $course->fill($fill);
        return $course->save();
    }
    public static function updateData($request,$course){
        $update = $request->all();
        $update["img"] = FileDownloader::saveFile("/upload/course/",$request,"img",$course->img);
        $course->update($update);
        return $course->save();
    }

    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }
    public function language(){
        return $this->belongsTo(Language::class,"language_id","id");
    }





}
