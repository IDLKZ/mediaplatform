<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Materials;
use App\Models\Result;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Vimeo\Laravel\Facades\Vimeo;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with("course")->orderBy("created_at","desc")->paginate(12);
        return view("admin.media.video.index",compact("videos"));




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
        $courses = Course::all();
        return  view("admin.media.video.create",compact("courses","validator", 'route'));
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
        return redirect(route('admin-video.index'));
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
            return  view("admin.media.video.show",compact("video", 'file'));
        }
        else{
            Toastr::warning('Видео не найден!','Упс!');
            return redirect(route('admin-video.index'));
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
                "course_id"=>"required",
                'video_url'=> 'required',
                "description"=>"required",
            ]);
            $courses = Course::all();
            return  view("admin.media.video.edit",compact("video","courses","validator"));
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("admin-video.index"));
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
                "course_id"=>"required",
                'video_url'=> 'required',
                "description"=>"required",
            ]);
            if(Video::updateData($request,$video)){
                Toastr::success("Успешно обновлено видео","Ура!");
            }
            else{
                Toastr::success("Кажись, что-то пошло не так","Упс...");
            }
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
        }
        return redirect(route('admin-video.index'));

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
            return redirect(route('admin-video.index'));
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("admin-video.index"));
        }
    }

    public function subscriber($alias){
        $video = Video::where("alias",$alias)->first();
        if($video){
            $uservideos = UserVideo::where("video_id",$video->id)->with(["student","video"])->paginate(12);
            return view("admin.media.video.uservideo",compact("uservideos"));
        }
        else{
           return redirect()->back();
        }
    }

    public function checked($alias){
        $video = Video::where("alias",$alias)->first();
        if($video){
            $results = Result::where(["video_id"=>$video->id,"checked"=>1])->with(["student","examination","course","author","video"])->paginate(12);
            return view("admin.result.index",compact("results"));
        }
        else{
            return redirect(route('admin-video.index'));
        }
    }
    public function unchecked($alias){
        $video = Video::where("alias",$alias)->first();
        if($video){
            $results = Result::where(["video_id"=>$video->id,"checked"=>0])->with(["student","examination","course","author","video"])->paginate(12);
            return view("admin.result.index",compact("results"));
        }
        else{
            return redirect(route('admin-video.index'));
        }
    }

    public function material($alias){
        $video = Video::where("alias",$alias)->first();
        if($video){
            $materials = Materials::where("video_id",$video->id)->with(["author","video"])->paginate(12);
            return view("admin.media.material.index",compact("materials"));
        }
        else{
            return redirect(route('admin-video.index'));
        }
    }
}
