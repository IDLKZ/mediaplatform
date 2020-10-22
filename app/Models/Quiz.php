<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable=["author_id","title"];

    public function author(){
        return $this->belongsTo(User::class, "author_id","id");
    }
    public function questions(){
        return $this->hasMany(Question::class,"quiz_id","id");
    }




    public static function saveData($request){
        $model = new self();
        $request["author_id"] = Auth::id();
        $model->fill($request);
        return $model->save();
    }
    public static function updateData($request,$quiz){
        $request["author_id"] = Auth::id();
        $quiz->update($request);
        return $quiz->save();
    }





}
