<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Materials;
use App\Models\Result;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserVideo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.main');
    }
    public function users(){
        return view("admin.user.index");
    }

    public function administrators($type){
        if($type){
            if($type == "confirmed"){
                $administrators = User::where(["role_id"=>1,"status"=>1])->orderBy("created_at","desc")->paginate(9);
                return view("admin.user.administrators",compact("administrators"));
            }
            if($type == "unconfirmed"){
                $administrators = User::where(["role_id"=>1,"status"=>0])->orderBy("created_at","desc")->paginate(9);
                return view("admin.user.administrators",compact("administrators"));
            }
            if ($type == "all") {
                $administrators = User::where("role_id",1)->orderBy("created_at","desc")->paginate(9);
                return view("admin.user.administrators",compact("administrators"));
            }
            abort(404);
        }
        else{
            abort(404);
        }


    }

    //Teacher
    public function teachers($type){
        if($type){
            if($type == "confirmed"){
                $teachers = User::where(["role_id"=>2,"status"=>1])->orderBy("created_at","desc")->paginate(9);
                $teachers->load(["courses","author_subscribers","videos"]);
                return view("admin.user.teachers",compact("teachers"));
            }
            if($type == "unconfirmed"){
                $teachers = User::where(["role_id"=>2,"status"=>0])->orderBy("created_at","desc")->paginate(9);
                $teachers->load(["courses","author_subscribers","videos"]);
                return view("admin.user.teachers",compact("teachers"));
            }
            if ($type == "all") {
                $teachers = User::where("role_id",2)->orderBy("created_at","desc")->paginate(9);
                $teachers->load(["courses","author_subscribers","videos"]);
                return view("admin.user.teachers",compact("teachers"));
            }
            abort(404);
        }
        else{
            abort(404);
        }
    }

    public function teacherSubscriber($id){
        $user = User::find($id);
        $subscribers = Subscriber::where("author_id",$id)->with(["user","course"])->paginate(12);
        if($user && !$subscribers->isEmpty()){
            return  view("admin.user.teacher.subscribers",compact("id","subscribers"));
        }
        else{
            Toastr::warning("Подписчиков у данного преподавателя нет","Упс...");
            return redirect()->back();
        }
    }

    public function teacherCourse($id){
        $user = User::find($id);
        $courses = Course::where("author_id",$user->id)->paginate(12);
        if($user && !$courses->isEmpty()){
            return  view("admin.user.teacher.courses",compact("id","courses"));
        }
        else{
            Toastr::warning("Курсов у данного преподавателя нет","Упс...");
            return redirect()->back();
        }
    }

    public function teacherResult($id){
        $results = Result::where("author_id",$id)->with(["student","author","course","video","examination"])->paginate(15);
        if($results->isNotEmpty())
        {
            return  view("admin.user.teacher.result",compact("id","results"));
        }
        else
        {
            Toastr::warning("Результаты не найдены","Упс");
            return  redirect()->back();

        }
    }

    public function teacherMaterial($id){
        $materials = Materials::where("author_id",$id)->with(["video","author"])->paginate(15);
        if($materials->isNotEmpty()){
            return view("admin.user.teacher.material",compact("materials"));
        }
        else{
            Toastr::warning("Материалы не найдены","Упс");
            return  redirect()->back();
        }
    }

    //End of Teacher

    //Student
    public function students($type){
        if($type){
            if($type == "confirmed"){
                $students = User::where(["role_id"=>3,"status"=>1])->orderBy("created_at","desc")->paginate(9);
                $students->load(["uservideo","subscribers"]);
                return view("admin.user.students",compact("students"));
            }
            if($type == "unconfirmed"){
                $students = User::where(["role_id"=>3,"status"=>0])->orderBy("created_at","desc")->paginate(9);
                $students->load(["uservideo","subscribers"]);
                return view("admin.user.students",compact("students"));
            }
            if ($type == "all") {
                $students = User::where("role_id",3)->orderBy("created_at","desc")->paginate(9);
                $students->load(["uservideo","subscribers"]);
                return view("admin.user.students",compact("students"));
            }
            abort(404);
        }
        else{
            abort(404);
        }
    }

    public function studentCourse($id){
        $subscribers = Subscriber::where("user_id",$id)->paginate(12);
        if($subscribers){
            $subscribers->load(["course","author"]);
            return  view("admin.user.student.courses",compact("id","subscribers"));
        }
        else{
            Toastr::warning("Курсов у данного преподавателя нет","Упс...");
            return redirect()->back();
        }
    }

    public function studentAccessVideo($id){
        $subscribers = Subscriber::where("user_id",$id)->with(["course","videos","uservideo"])->paginate(12);
        return view("admin.user.student.accessVideo",compact("subscribers"));

    }


}
