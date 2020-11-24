<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Materials;
use App\Models\Result;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Vimeo\Laravel\Facades\Vimeo;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos = Video::whereIn("course_id",Auth::user()->courses->pluck("id")->toArray())->with("course")->paginate(12);
        return view("teacher.media.video.index",compact("videos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make( [
            'title'=> 'required|max:255',
            "course_id"=>"required",
            'video_url'=> 'required',
            "description"=>"required",
        ]);
        $route = route('video.index');
        $courses = Course::where(["author_id"=>Auth::user()->id])->get();
        return  view("teacher.media.video.create",compact("courses","validator", 'route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|max:255',
            "course_id"=>"required",
            'video_url'=> 'required',
            "description"=>"required",
        ]);
        Video::saveData($request);
        Toastr::success('Видео успешно создано!', 'Ураа ...!');
        return redirect(route('video.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        $video = Video::where("alias",$alias)->first();
        if($video){
            $video->load(["course","materials"]);
            $file = $video->watch($video->video_url);
            return  view("teacher.media.video.show",compact("video", 'file'));
        }
        else{
            Toastr::warning('Видео не найден!','Упс!');
            return  redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
        $video = Video::where("alias",$alias)->first();
        if($video){
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
                'video_url'=> 'required',
                "course_id"=>"required",
                "description"=>"required",
            ]);
            $courses = Course::where(["author_id"=>Auth::user()->id])->get();
            return  view("teacher.media.video.edit",compact("video","courses","validator"));
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("video.index"));
        }




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alias)
    {
        $video = Video::where("alias",$alias)->first();
        if($video){
            $this->validate($request, [
                'title'=> 'required|max:255',
                'video_url'=> 'required',
                "course_id"=>"required",
                "description"=>"required",
            ]);
            if(Video::updateData($request,$video)){
                Toastr::success("Успешно обновлено видео","Ура!");
                return redirect()->back();
            }
            else{
                Toastr::success("Кажись, что-то пошло не так","Упс...");
                return redirect()->back();
            }
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("video.index"));
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alias)
    {
        $video = Video::where(["alias"=>$alias])->first();
        if($video){
            $course_id = $video->course_id;
            $video->delete();
            Video::recountNumber($course_id);
            Toastr::success('Видео было успешно удалено','Успешно удалено видео!');
            return redirect()->back();
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("video.index"));
        }

    }

    public function subscriber($alias){
        $uservideos = UserVideo::whereIn("video_id",Video::where("alias",$alias)->pluck("id")->toArray())->whereIn("id",Auth::user()->videos->pluck("id")->toArray())->with("student")->paginate(12);
        return view("teacher.media.video.subscriber",compact("uservideos"));
    }

    public function checked($alias){
        $results = Result::whereIn("video_id",Video::where("alias",$alias)->pluck("id")->toArray())->where(["author_id"=>Auth::id(),"checked"=>1])->with(["student","author","course","video","examination"])->paginate(12);
        return view("teacher.result.index",compact("results"));
    }

    public function unchecked($alias){
        $results = Result::whereIn("video_id",Video::where("alias",$alias)->pluck("id")->toArray())->where(["author_id"=>Auth::id(),"checked"=>0])->with(["student","author","course","video","examination"])->paginate(12);
        return view("teacher.result.index",compact("results"));
    }

    public function material($alias){
        $video = Video::where("alias",$alias)->first();
        if($video){
            $materials = Materials::where(["video_id"=>$video->id,"author_id"=>Auth::id()])->with(["video","author"])->paginate(12);
            return view("teacher.media.material.index",compact("materials"));
        }
        else{
            return redirect()->back();
        }


    }


}
