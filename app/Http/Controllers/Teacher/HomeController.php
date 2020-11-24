<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Subscriber;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    //Главная страница
    public function index()
    {
        return view('teacher.main');
    }

    public function tasks(){
        $count["users"] = Subscriber::where(["author_id"=>Auth::id(),"status"=>0])->count();
        $count["userrequest"] = UserRequest::whereIn("video_id",Auth::user()->videos->pluck("id")->toArray())->count();
        $count["results"] = Result::where("author_id",Auth::id())->count();
        return view("teacher.tasks.index",compact("count"));
    }

    //users

    public function users(){
        return view("teacher.user.index");
    }

    public function media(){
        return view("teacher.media.index");
    }

    public function exams(){
        return view("teacher.exams.index");
    }

    public function request(){
        return view("teacher.request.index");
    }

    public function search(){
        return view("teacher.search.index");
    }


}
