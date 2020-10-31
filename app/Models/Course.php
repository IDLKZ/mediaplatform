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

    //1.Ссылки на таблицы бд
    //Автор
    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }
    //Язык
    public function language(){
        return $this->belongsTo(Language::class,"language_id","id");
    }


    //2. Есть в видео
    public function videos(){
        return $this->hasMany(Video::class,"course_id","id");
    }
    //Подписки
    public function subscribers(){
        return $this->hasMany(Subscriber::class,"course_id","id");
    }
    //Экзамены
    public function examinations(){
        return $this->hasMany(Examination::class,"course_id","id");
    }
    //Результаты
    public function results(){
        return $this->hasMany(Result::class,"course_id","id");
    }



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
        $update["status"] = $request->has("status") ? 1 : 0;
        $update["img"] = FileDownloader::saveFile("/upload/course/",$request,"img",$course->img);
        $course->update($update);
        return $course->save();
    }





}
