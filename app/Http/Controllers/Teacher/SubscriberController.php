<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class SubscriberController extends Controller
{
    public function confirmed(){
        $subscribers = Auth::user()->author_subscribers()->where("status",1)->paginate(15);
        if(!$subscribers->isEmpty()){
            return view("teacher.subscriber.index",compact("subscribers"));
        }
        else{
            return  redirect()->back();
        }

    }

    public function unconfirmed(){
        $subscribers = Auth::user()->author_subscribers()->where("status",0)->paginate(15);
        if(!$subscribers->isEmpty()){
            return view("teacher.subscriber.index",compact("subscribers"));
        }
        else{
            return  redirect()->back();
        }
    }

    public function getAccessVideo($id){
        $subscriber = Auth::user()->author_subscribers()->find($id);
        if($subscriber){
            $validator = JsValidator::make( [
                'subscribe_id'=>"required",
                'student_id'=>'required',
                'video_id'=> 'required',
            ]);
            $videos = $subscriber->videos;
            return view("teacher.subscriber.video",compact("videos","subscriber","validator"));
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

}