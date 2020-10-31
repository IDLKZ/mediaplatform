<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

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

    //1.Родительский элемент
    public function course(){
        return $this->belongsTo(Course::class,"course_id","id");
    }
    //2.Дочерний элемент
    //Материалы
    public function materials(){
        return $this->hasMany(Materials::class,"video_id","id");
    }
    //Экзамены
    public function examination(){
        return $this->hasOne(Examination::class,"video_id","id");
    }
    //Результаты
    public function results(){
        return $this->hasMany(Result::class,"video_id","id");
    }
    //Пользователь Видео
    public function uservideo(){
        return $this->hasMany(UserVideo::class,"video_id","id");
    }




    public static function saveData($request, $response){
        $video = new self();
        $fill = $request->all();
        $fill["video_url"] = $response['body']['link'];
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

    public function watch($url)
    {
        $whitelist = ['Vimeo'];
        $params = [
            'autoplay' => 1,
            'loop' => 1,
            'download' => false
        ];

//Optional attributes for embed container
        $attributes = [
            'type' => null,
            'class' => 'iframe-class',
            'data-html5-parameter' => true,
            'width' => '100%',
            'height' => '500',
            'download' => false
        ];
        return LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);
    }


}
