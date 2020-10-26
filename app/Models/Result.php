<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ["student_id","author_id","course_id","video_id","examination_id",
        "answers","student_comments","teacher_comments","checked","passed_day","checked_day",
        "status","result"
    ];

    protected $casts = [
        "answers"=>"array"
    ];

    public function student(){
        return $this->belongsTo(User::class,"student_id","id");
    }
    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }
    public function course(){
        return $this->belongsTo(Course::class,"course_id","id");
    }
    public function video(){
        return $this->belongsTo(Video::class,"video_id","id");
    }
    public function examination(){
        return $this->belongsTo(Examination::class,"examination_id","id");

    }

    public static function prepareData($data){
        $data["answers"] = [];
        foreach ($data["question"] as $question_id => $question_value){
            $data["answers"][$question_id]["question"] = $question_value;
            $data["answers"][$question_id]["answer"] = $data["answer"][$question_id];
            $data["answers"][$question_id]["right"] = $data["right"][$question_id];
        }
        $data["result"] = 0;
        foreach ($data["answer"] as $answer_key => $answer_value){
            if($answer_value == $data["right"][$answer_key]){
                $data["result"]++;
            }
        }
        $data["passed_day"]  = date('Y-m-d H:i:s');
        return $data;
    }

    public static function saveResult($data){
        $result = new self();
        $result->fill($data);
        return $result->save();
    }




}
