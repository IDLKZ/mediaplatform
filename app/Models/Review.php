<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ["title","author_id"];


    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }


    public static function saveData($request){
        $model = new self();
        $request["author_id"] = Auth::id();
        $model->fill($request);
        return $model->save();
    }

    public static function updateData($request,$review){
        $review->update($request);
        return $review->save();
    }



}
