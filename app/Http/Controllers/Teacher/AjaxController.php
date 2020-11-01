<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Review;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function getVideo(Request $request){
        $videos = Video::where("course_id",$request->get("course_id"))->get();
        if(count($videos)){
            return response()->json($videos);
        }
        else{
            return response()->json([]);
        }
    }

    public function getType(Request $request){
        switch ($request->get("type")){
            case "test":
                $data["data"] =  Auth::user()->quiz()->has('questions', '>' , 10)->get();
                $data['type'] = "quiz_id";

                return response()->json($data);
            case "review":
                $data["data"] = Auth::user()->reviews()->has("reviewquestion",">",1)->get();
                $data['type'] = "review_id";
                return response()->json($data);
            default:
                return response()->json([]);
        }
    }
    public function searchAuthor(Request $request){

        $users = [];

        if($request->has('q')){
            $search = $request->q;
            $users =User::select("id", "name")
                ->where("role_id",2)->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($users);
    }


}
