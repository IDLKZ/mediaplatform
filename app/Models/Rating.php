<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "ratings";
    protected $fillable = ["user_id","news_id","rating"];


    public static function createData($request){
        $rating = new self();
        $rating->fill($request);
        return $rating->save();
    }
    public static function updateData($rating,$request){
        $rating->update($request);
        return $rating->save();
    }






}
