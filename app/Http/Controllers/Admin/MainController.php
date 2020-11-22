<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Materials;
use App\Models\Question;
use App\Models\Result;
use App\Models\ReviewQuestion;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserRequest;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Главная страница
    public function index()
    {
        return view('admin.main');
    }
    //Пользователи
    public function users(){
        return view("admin.user.index");
    }
    //Администраторы
    public function administrators($type){
        if($type){
            if($type == "confirmed"){
                $administrators = User::where(["role_id"=>1,"status"=>1])->orderBy("created_at","desc")->paginate(12);
                return view("admin.user.administrators",compact("administrators"));
            }
            if($type == "unconfirmed"){
                $administrators = User::where(["role_id"=>1,"status"=>0])->orderBy("created_at","desc")->paginate(12);
                return view("admin.user.administrators",compact("administrators"));
            }
            if ($type == "all") {
                $administrators = User::where("role_id",1)->orderBy("created_at","desc")->paginate(12);
                return view("admin.user.administrators",compact("administrators"));
            }
            abort(404);
        }
        else{
            abort(404);
        }
    }

    //Учителя
    public function teachers($type){
        if($type){
            //Подтвержденные учителя
            if($type == "confirmed"){
                $teachers = User::where(["role_id"=>2,"status"=>1])->orderBy("created_at","desc")->paginate(12);
                $teachers->load(["courses","author_subscribers","videos"]);
                return view("admin.user.teachers",compact("teachers"));
            }
            //Неподтвежденные учителя
            if($type == "unconfirmed"){
                $teachers = User::where(["role_id"=>2,"status"=>0])->orderBy("created_at","desc")->paginate(12);
                $teachers->load(["courses","author_subscribers","videos"]);
                return view("admin.user.teachers",compact("teachers"));
            }
            //Все учителя
            if ($type == "all") {
                $teachers = User::where("role_id",2)->orderBy("created_at","desc")->paginate(12);
                $teachers->load(["courses","author_subscribers","videos"]);
                return view("admin.user.teachers",compact("teachers"));
            }
            abort(404);
        }
        //если нет то 404
        else{
            abort(404);
        }
    }
    //Подписчики учителя
    public function teacherSubscriber($id){
        $user = User::find($id);
        $subscribers = Subscriber::where("author_id",$id)->with(["user","course"])->paginate(12);
        if($user && !$subscribers->isEmpty()){
            return  view("admin.user.teacher.subscribers",compact("id","subscribers"));
        }
        else{
            Toastr::warning("Подписчиков у данного преподавателя нет","Упс...");
            return redirect(route("user.show",$id));
        }
    }
    //Курсы у преподавателя
    public function teacherCourse($id){
        $user = User::find($id);
        $courses = Course::where("author_id",$user->id)->paginate(12);
        if($user && !$courses->isEmpty()){
            return  view("admin.user.teacher.courses",compact("id","courses"));
        }
        else{
            Toastr::warning("Курсов у данного преподавателя нет","Упс...");
            return redirect(route("user.show",$id));
        }
    }
    //Результаты учителя
    public function teacherResult($id){
        $results = Result::where("author_id",$id)->with(["student","author","course","video","examination"])->paginate(15);
        if($results->isNotEmpty())
        {
            return  view("admin.user.result",compact("id","results"));
        }
        else
        {
            Toastr::warning("Результаты не найдены","Упс");
            return redirect(route("user.show",$id));
        }
    }
    //Материалы учителя
    public function teacherMaterial($id){
        $materials = Materials::where("author_id",$id)->with(["video","author"])->paginate(15);
        if($materials->isNotEmpty()){
            return view("admin.user.teacher.material",compact("materials","id"));
        }
        else{
            Toastr::warning("Материалы не найдены","Упс");
            return redirect(route("user.show",$id));
        }
    }

    //Конец учителя

    //Студент
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
        //Неизвестный запрос
        else{
            abort(404);
        }
    }
    //Курс студента
    public function studentCourse($id){
        $subscribers = Subscriber::where("user_id",$id)->paginate(12);
        if($subscribers){
            $subscribers->load(["course","author"]);
            return  view("admin.user.student.courses",compact("id","subscribers"));
        }
        else{
            Toastr::warning("Курсов у данного студента нет","Упс...");
            return redirect(route("user.show",$id));
        }
    }
    //Список открытых видео у студента
    public function studentAccessVideo($id){
        $subscribers = Subscriber::where("user_id",$id)->with(["course","videos","uservideo"])->paginate(12);
        return view("admin.user.student.accessVideo",compact("subscribers","id"));
    }
    //Действие на открытие доступа к видео у студента
    public function Access(Request $request){
        $this->validate($request,["student_id"=>"required","subscribe_id"=>"required","video_id"=>"required"]);
        $uservideo = UserVideo::where(["student_id"=>$request->get("student_id"),"subscribe_id"=>$request->get("subscribe_id"),"video_id"=>$request->get("video_id")])->first();
        if(!$uservideo){
            $userrequest = UserRequest::where(["user_id"=>$request->get("student_id"),"video_id"=>$request->get("video_id")])->first();
            if($userrequest){$userrequest->delete();}
            Toastr::success("Успешно открыт доступ","Отлично");
            UserVideo::create(["student_id"=>$request->get("student_id"),"subscribe_id"=>$request->get("subscribe_id"),"video_id"=>$request->get("video_id")]);
        }
        else{
            $uservideo->delete();
            Toastr::warning("Доступ к видео заблокирован","Выполнено");
        }
        return redirect()->back();
    }


    //Запросы студента
    public function studentRequest(){

    }
    //Конец студента


    //Start of Media
    public function media(){
        return view("admin.media.index");
    }


    //Examination
    public function exams(){
        return view("admin.exams.index");
    }

    //request
    public function request(){
        return view("admin.request.index");
    }

    public function requestUser(){
        $users = User::where("status",0)->with("role")->paginate(12);
        return view("admin.request.user",compact("users"));
    }
    public function requestResult(){
        $results = Result::where("checked",0)->with(['video', 'course', 'author', 'student'])->paginate(12);
        return view("admin.request.result",compact("results"));
    }

    public function requestVideo(){
        $userrequest = UserRequest::with(["user","video"])->paginate(15);
        return view("admin.request.video",compact("userrequest"));
    }

    public function userVideo($id){
        $userrequest = UserRequest::with("video")->find($id);
        if($userrequest){
            $subscribers = Subscriber::where(["user_id"=>$userrequest->user_id,"course_id"=>$userrequest->video->course_id])->with(["course","videos","uservideo"])->paginate(12);
            return view("admin.user.student.accessVideo",compact("subscribers"));
        }
        return redirect()->back();
    }

    //search
    public function search(){
        return view("admin.search.index");
    }

    public function searchUser(){
        return view("admin.search.user");
    }

    public function searchUserResult(Request $request){
        $this->validate($request,["query"=>"required|min:1"]);
        $searchterm = $request->input('query');
        $searchResults = User::where('name','LIKE','%'.$searchterm.'%')->with("role")->paginate(15);
        $searchResults->appends(['query' => $searchterm]);
        return view("admin.search.user",compact("searchResults","searchterm"));
    }
    public function searchMedia(){
        return view("admin.search.media");
    }

    public function searchMediaResult(Request $request){
        $this->validate($request,["query"=>"required|min:1","type"=>"required"]);
        $searchterm = $request->input('query');
        $searchtype = $request->input('type');
       switch ($searchtype) {
           case "course" :
               $searchResults = Course::where('title','LIKE','%'.$searchterm.'%')->with(["author","language"])->paginate(15);
               $searchResults->appends(['type' => $searchtype]);
               $searchResults->appends(['query' => $searchterm]);
               return view("admin.search.media",compact("searchResults","searchterm","searchtype"));
           case "video" :
               $searchResults = Video::where('title','LIKE','%'.$searchterm.'%')->with(["course","examination"])->paginate(15);
               $searchResults->appends(['type' => $searchtype]);
               $searchResults->appends(['query' => $searchterm]);
               return view("admin.search.media",compact("searchResults","searchterm","searchtype"));
           case "material" :
               $searchResults = Materials::where('title','LIKE','%'.$searchterm.'%')->with(["video"])->paginate(15);
               $searchResults->appends(['type' => $searchtype]);
               $searchResults->appends(['query' => $searchterm]);
               return view("admin.search.media",compact("searchResults","searchterm","searchtype"));
           case "examination" :
               $searchResults = Examination::where('title','LIKE','%'.$searchterm.'%')->with(["video","quiz","review","author"])->paginate(15);
               $searchResults->appends(['type' => $searchtype]);
               $searchResults->appends(['query' => $searchterm]);
               return view("admin.search.media",compact("searchResults","searchterm","searchtype"));
           default:
               return abort(404);
       }
    }

    public function searchQuestion () {
        return view("admin.search.question");
    }

    public function searchQuestionResult(Request $request){
        $this->validate($request,["query"=>"required|min:1","type"=>"required"]);
        $searchterm = $request->input('query');
        $searchtype = $request->input('type');
        switch ($searchtype) {
            case "quiz" :
                $searchResults = Question::where('question','LIKE','%'.$searchterm.'%')->with("quiz")->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("admin.search.question",compact("searchResults","searchterm","searchtype"));
            case "review" :
                $searchResults = ReviewQuestion::where('question','LIKE','%'.$searchterm.'%')->with("review")->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("admin.search.question",compact("searchResults","searchterm","searchtype"));
            default:
                return abort(404);
        }
    }

    public function news(){
        return view("admin.news.index");
    }
}
