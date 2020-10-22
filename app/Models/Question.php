<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ["quiz_id","question","A","B","C","D","E","answer"];

    public function quiz(){
        return $this->belongsTo(Quiz::class,"quiz_id","id");
    }
    public static function saveData($request){
        $model = new self();
        $model->fill($request);
        return $model->save();
    }
    public static function updateData($request,$question){
        $question->update($request);
        return $question->save();
    }


}
