<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $videos = Video::with("course")->paginate(15);
        if(!$videos->isEmpty()){
            return view("admin.video.index",compact("videos"));
        }
        else{
            return  redirect()->back();
        }


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
            'video_url'=> 'required|mime:mp4,mov,ogg,qt|max:500000',
            "count"=>"required|integer|max:255",
            "description"=>"required",
        ]);
        $route = route('video.index');
        $courses = Course::all();
        return  view("admin.video.create",compact("courses","validator", 'route'));
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
            'video_url'=> 'required|mimes:mp4,mov,ogg,qt|max:50000000',
            "count"=>"required|integer|max:255",
            "description"=>"required",
        ]);

        $client = Vimeo::connection('main');
        $file_name = $request->file('video_url');
        $uri = $client->upload($file_name, [
            "name" => $request->get('title').'-'.Str::random(7),
            "description" => $request->get('description')
        ]);
        $response = $client->request($uri . '?fields=link');
        Video::saveData($request, $response);
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
            return  view("admin.video.show",compact("video", 'file'));
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
                'video_url'=> 'sometimes|mime:mp4,mov,ogg,qt|max:500000',
                "count"=>"required|integer",
                "description"=>"required",
            ]);
            $courses = Course::all();
            return  view("admin.video.edit",compact("video","courses","validator"));
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
                'video_url'=> 'sometimes|mimes:mp4,mov,ogg,qt|max:500000',
                "count"=>"required|integer",
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
            return  redirect(route("admin-video.index"));
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
            $client = Vimeo::connection('main');
            $TIMA = Str::of($video->video_url)->ltrim('https://vimeo.com/');
            $uri = "/videos/$TIMA";
            $client->request($uri, [], 'DELETE');
            $video->delete();
            Toastr::success('Видео было успешно удалено','Успешно удалено видео!');
            return redirect()->back();
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("admin-video.index"));
        }
    }
}
