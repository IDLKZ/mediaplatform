<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{
    use HasFactory;
    protected $fillable =["subscribe_id","video_id","student_id","total","status"];


    public function subscribe(){
        return $this->belongsTo(Subscriber::class,"subscribe_id","id");
    }


    public function video(){
        return $this->belongsTo(Video::class,"video_id","id");
    }

    public static function saveData($request){
        $model = new self();
        $model->fill($request);
        return $model->save();
    }

    public static function updateData($request,$data){
        $data->update($request);
        return $data->save();
    }



}
