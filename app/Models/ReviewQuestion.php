<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReviewQuestion extends Model
{
    use HasFactory;
    protected $fillable = ["review_id","question"];


    public function review(){
        return $this->belongsTo(Review::class,"review_id","id");
    }


    public static function saveData($request){
        $model = new self();
        $model->fill($request);
        return $model->save();
    }

    public static function updateData($request,$review){
        $review->update($request);
        return $review->save();
    }
}
