<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::find(Auth::id());
        $videos = $user->videos()->paginate(15);
        return view("teacher.video.index",compact("videos"));
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
            "count"=>"required|integer",
            "description"=>"required",
        ]);
        $courses = Course::where(["author_id"=>Auth::user()->id])->get();
        return  view("teacher.video.create",compact("courses","validator"));
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
            'video_url'=> 'required|mimes:mp4,mov,ogg,qt|max:500000',
            "count"=>"required|integer",
            "description"=>"required",
        ]);
        if(Video::saveData($request)){
            Toastr::success("Успешно добавлено видео","Ура!");
            return redirect()->back();
        }
        else{
            Toastr::success("Кажись, что-то пошло не так","Упс...");
            return redirect()->back();
        }
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
        $file = File::get(storage_path("videos/".$video->video_url));
        if($video){
            $video->load(["course"]);

            return  view("teacher.video.show",compact("video","file"));
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
            $courses = Course::where(["author_id"=>Auth::user()->id])->get();
            return  view("teacher.video.edit",compact("video","courses","validator"));
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
            if(Storage::disk("videos")->exists($video->video_url)){
                Storage::disk("videos")->delete($video->video_url);
            }
            $video->delete();
            Toastr::success('Видео было успешно удалено','Успешно удалено видео!');
            return redirect()->back();
        }
        else{
            Toastr::warning('Видео не найдено!','Упс!');
            return  redirect(route("video.index"));
        }

    }

    public function watch($id){

            $video = Video::find($id);
            $filename = storage_path() . "/videos/".$video->video_url;
            $headers = array ([
                'Content-type' => 'video/mp4',
                'Content-Disposition' => 'inline; filename="index.php'
            ]);
            return \response( file_get_contents($filename), 200,)->header( 'Content-type', 'video/mp4',);


    }
}
