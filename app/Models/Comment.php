<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = ["user_id","news_id","comment"];

    public static function createData($request){
        $comment = new self();
        $comment->fill($request);
        return $comment->save();
    }
    public static function updateData($comment,$request){
        $comment->update($request);
        return $comment->save();
    }


}
