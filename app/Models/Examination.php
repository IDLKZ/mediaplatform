<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Examination extends Model
{
    use HasFactory;
    protected $fillable = ["id","course_id","video_id","quiz_id","review_id","author_id","title","description","file"];


    //1.Parent Model
    public function course(){
        return $this->belongsTo(Course::class,"course_id","id");
    }
    public function video(){
        return $this->belongsTo(Video::class,"video_id","id");
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class,"quiz_id","id");
    }
    public function review(){
        return $this->belongsTo(Review::class,"review_id","id");
    }
    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }




    public static function saveData($request){
        $model = new self();
        $request["author_id"] = Auth::id();
        $model->fill($request);
        return $model->save();
    }

    public static function updateData($request,$examination){
        if(isset($request["review_id"])){
            $request["quiz_id"] = null;
        }
        if(isset($request["quiz_id"])){
            $request["review_id"] = null;
        }
        $examination->update($request);
        return $examination->save();
    }

    public static function getQuestions($id,$number){
        $data = false;
        $questions = Question::where("quiz_id",$id)->get()->toArray();
        if (count($questions)>0) {
            $rand_keys = array_rand($questions, $number);
            foreach ($rand_keys as $key){
                $data[$key]["id"] = $questions[$key]["id"];
                $data[$key]["question"] = $questions[$key]["question"];
                $data[$key]["answer"] = $questions[$key][$questions[$key]["answer"]];
                $data[$key]["questions"][] = $questions[$key]["A"];
                $data[$key]["questions"][] = $questions[$key]["B"];
                $data[$key]["questions"][] = $questions[$key]["C"];
                $data[$key]["questions"][] = $questions[$key]["D"];
                $data[$key]["questions"][] = $questions[$key]["E"];
            }
            foreach ($data as $k=> $d){
                shuffle($data[$k]["questions"]);
            }


        }
        return $data;

    }



}
