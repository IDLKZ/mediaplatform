<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class News extends Model
{
    use HasFactory;
    protected $table = "news";
    protected $fillable = ["category_id","author_id","language_id","title","description","links","alias","thumbnail","img"];
    protected $casts = ["links"=>"array"];
    use Sluggable;

    public function sluggable()
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }
    public function language(){
        return $this->belongsTo(Language::class,"language_id","id");
    }


    public static function createData($request){
        $news = new self();
        $data = $request->all();
        $data["author_id"] = Auth::id();
        $data["thumbnail"] = FileDownloader::saveFile("/upload/news/thumbnail/",$request,"thumbnail");
        $data["img"] = FileDownloader::saveFile("/upload/news/img/",$request,"img");
        $news->fill($data);
        return $news->save();
    }

    public static function updateData($news, $request){
        $data = $request->all();
        $data["author_id"] = Auth::id();
        $data["thumbnail"] = FileDownloader::saveFile("/upload/news/thumbnail/",$request,"thumbnail",$news->thumbnail);
        $data["img"] = FileDownloader::saveFile("/upload/news/img/",$request,"img",$news->img);
        $news->update($data);
        return $news->save();



    }


}
