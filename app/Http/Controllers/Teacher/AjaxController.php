<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getVideo(Request $request){
        return "hello!";
        $videos = Video::where("course_id",$request->get("course_id"))->get();
        if(count($videos)){
            return response()->json($videos);
        }
        else{
            return null;
        }




    }
}
