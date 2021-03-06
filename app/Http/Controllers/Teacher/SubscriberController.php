<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Result;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserRequest;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class SubscriberController extends Controller
{
    //Подтвержденные слушатели
    public function confirmed()
    {
        $subscribers = Subscriber::with(['user',"author","course"])->where(["status" => 1, 'author_id' => Auth::id()])->paginate(15);
        return view("teacher.user.subscriber.index",compact("subscribers"));
    }

    //Неподтвержденные слушатели
    public function unconfirmed(){
        $subscribers = Subscriber::with(['user',"author","course"])->where(["status" => 0, 'author_id' => Auth::id()])->paginate(15);
        return view("teacher.user.subscriber.index",compact("subscribers"));
    }

    public function listRequestVideo(){
        $videos = Auth::user()->videos->pluck("id")->toArray();
        $userrequest = UserRequest::whereIn("video_id",$videos)->with(["user","video"])->paginate(15);
        return view("teacher.request.video",compact("userrequest"));
    }

    public function requestVideo($id){
        $userrequest = UserRequest::with("video")->find($id);
        if($userrequest){
            $subscribers = Subscriber::where(["user_id"=>$userrequest->user_id,"author_id"=>Auth::id(),"status"=>1,"course_id"=>$userrequest->video->course_id])->with(["course","videos","uservideo"])->paginate(12);
            return view("teacher.user.subscriber.accessVideo",compact("subscribers"));

        }
        return redirect(route('teacher-media'));

    }

    public function getAccessVideo($id){

        $subscriber = Subscriber::with(['user', 'videos', 'author'])->where(['author_id' => Auth::id()])->find($id);
        if($subscriber){
            $validator = JsValidator::make( [
                'subscribe_id'=>"required",
                'student_id'=>'required',
                'video_id'=> 'required',
            ]);
            return view("teacher.user.subscriber.video",compact("subscriber","validator"));
        }
        else{
            Toastr::warning("Ничего не найдено","Упс...");
            return  redirect()->back();
        }

    }


    public function saveAccessVideo(Request $request){
        $this->validate($request,[
            'subscribe_id'=>"required",
            'student_id'=>'required',
            'video_id'=> 'required',
        ]);
        $uservideo = UserVideo::where(["subscribe_id"=>$request->get("subscribe_id"),"video_id"=>$request->get("video_id")])->first();
        if (!$uservideo){
            if(UserVideo::saveData($request->all())){
                Toastr::success("Доступ к видео успешно открыт","Отлично!");
                return  redirect()->back();
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return  redirect()->back();
            }
        }
        else{
            Toastr::warning("Данный пользователь уже имеет доступ к данному видео","Упс...");
            return  redirect()->back();

        }

    }


    //Страница подписчика
    public function subscriber($id)
    {
        $subscriber = Subscriber::where(["user_id"=>$id,"author_id"=>Auth::id()])->first();
        if($subscriber){
            $user = User::where("id",$subscriber->user_id)->with(["uservideo","subscribers","results_student"])->first();
            return view("teacher.user.subscriber.show",compact("user"));
        }
        else{
            return redirect(route("teacher-users"));
        }
    }
    //Курсы у подписчика
    public function course($id){
        $subscribers = Subscriber::where(["user_id"=>$id,"author_id"=>Auth::id()])->pluck("course_id")->toArray();
        $courses = Course::whereIn("id",$subscribers)->with(["author","language","videos","subscribers"])->paginate(12);
        return view("teacher.user.subscriber.course",compact("courses"));

    }
    //Видео у подписчика
    public function video($id){
        $user_video = UserVideo::where("student_id",$id)->pluck("video_id")->toArray();
        $course = Auth::user()->videos->pluck("id")->toArray();
        $videos = Video::whereIn("id",$course)->whereIn("id",$user_video)->with("course")->paginate(12);
        return view("teacher.user.subscriber.videos",compact("videos"));
    }

    public function result($id){
        $results = Result::where(["author_id"=>Auth::id(),"student_id"=>$id])->with(["student","author","course","video","examination"])->paginate(15);
        return view("teacher.result.index",compact("results"));
    }

    public function access($id){
        $subscribers = Subscriber::where(["user_id"=>$id,"author_id"=>Auth::id(),"status"=>1])->with(["course","videos","uservideo"])->paginate(12);
        return view("teacher.user.subscriber.accessVideo",compact("subscribers"));
    }

    public function giveAccessToVideo(Request  $request){
        $this->validate($request,["student_id"=>"required","video_id"=>"required","subscribe_id"=>"required"]);
        $user_video = UserVideo::where(["student_id"=>$request->get("student_id"),"video_id"=>$request->get("video_id"),"subscribe_id"=>$request->get("subscribe_id")])->first();
        if($user_video){
            $user_video->delete();
            Toastr::success("Доступ к видео закрыт!","Выполнено");
            return redirect()->back();
        }
        else{
            $userrequest = UserRequest::where(["user_id"=>$request->get("student_id"),"video_id"=>$request->get("video_id")])->first();
            if ($userrequest) {$userrequest->delete();}
            UserVideo::saveData($request->all());
            Toastr::success("Доступ к видео открыт!","Выполнено");
            return redirect()->back();
        }
    }

    public function subscribers()
    {
        $subscribers = Subscriber::with(['user',"author","course"])->where('author_id', Auth::id())->orderBy('status', 'desc')->paginate(15);
        return view('teacher.user.subscriber.index', compact('subscribers'));
    }

    public function accessSubscriber($id)
    {
        $subscribe = Subscriber::where(["id"=>$id,"author_id"=>Auth::id()])->first();
        if($subscribe){
            $subscribe->status = true;
            $subscribe->save();
            Toastr::success('Вы приняли участника!','Успешно!');
        }
        return redirect()->back();
    }

    public function cancelSubscriber($id){
        $subscribe = Subscriber::where(["id"=>$id,"author_id"=>Auth::id()])->first();
        if($subscribe){
            $subscribe->status = false;
            $subscribe->save();
            Toastr::success('Вы отменили участника!','Успешно!');
        }
        return redirect()->back();
    }
    public function deleteSubscriber($id)
    {
        $subscribe = Subscriber::where(["id"=>$id,"author_id"=>Auth::id()])->first();
        if($subscribe){
            $subscribe->delete();
            Toastr::success('Вы удалили участника!','Успешно!');
        }
        return redirect()->back();
    }

}
