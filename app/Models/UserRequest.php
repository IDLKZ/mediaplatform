<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    protected $table = "user_request";
    protected $fillable = ["user_id","video_id"];


    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function video(){
        return $this->belongsTo(Video::class,"video_id","id");
    }


    public static function createData($request){
        $user_request = new self();
        $user_request->fill($request);
        return $user_request->save();
    }

    public static function updateData($user_request,$request){
        $user_request->update($request);
        return $user_request->save();
    }
}
