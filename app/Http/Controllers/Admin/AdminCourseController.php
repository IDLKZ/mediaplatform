<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Language;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Merujan99\LaravelVideoEmbed\Services\LaravelVideoEmbed;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(["author","language","videos","subscribers"])->paginate(12);
        if($courses->isNotEmpty()){
            return view("admin.media.course.index",compact("courses"));
        }
        else{
            Toastr::warning("Пока курсов нет",'Упс');
            return  redirect()->route("admin-course.create");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();

        if(User::where("role_id",2)->count() && !$languages->isEmpty()){
            $validator = JsValidator::make( [
                "author_id"=>"required|exists:users,id",
                'title'=> 'required|max:255',
                'subtitle'=> 'required|max:500',
                "requirement"=>"required",
                'img' => 'sometimes|image|max:10000',
            ]);
            return  view("admin.media.course.create",compact("languages","validator"));
        }
        else{
            Toastr::warning("Создайте преподавателя!","Упс");
            return  redirect()->back();
        }

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
            "author_id"=>"required|exists:users,id",
            'title'=> 'required|max:255',
            'subtitle'=> 'required|max:500',
            "description"=>"required",
            "requirement"=>"required|max:255",
            'img' => 'sometimes|image|max:2000',
        ]);
        if(Course::saveData($request)){
            Toastr::success('Курс был успешно создан','Успешно создан курс!');
            return redirect()->back();
        }
        else{
            Toastr::warning('Произошла ошибка, попробуйте позже!','Упс!');
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
        $course = Course::where("alias",$alias)->with(["author","language"])->first();
        if($course){
            return  view("admin.media.course.show",compact("course"));
        }
        else{
            Toastr::warning('Курс не найденн!','Упс!');
            return redirect()->back();
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
        $course = Course::where("alias",$alias)->first();
        $languages = Language::all();
        if($course && !$languages->isEmpty())
        {
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
                'subtitle'=> 'required|max:500',
                "requirement"=>"required",
                'img' => 'sometimes|image|max:10000',
            ]);
            return  view("admin.media.course.edit",compact("course","validator","languages"));
        }
        else{
            Toastr::warning('Курс не найденн!','Упс!');
            return redirect()->back();
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

        $course = Course::where("alias",$alias)->first();
        if($course){
            $this->validate($request, [
                "author_id"=>"required|exists:users,id",
                'title'=> 'required|max:255',
                'subtitle'=> 'required|max:500',
                "requirement"=>"required|max:255",
                "description"=>"required",
                'img' => 'sometimes|image|max:2000',
            ]);
            if(Course::updateData($request,$course)){
                Toastr::success('Курс был успешно изменен','Успешно изменен курс!');
                return redirect(route('admin-course.index'));
            }
            else{
                Toastr::warning('Произошла ошибка, попробуйте позже!','Упс!');
                return redirect()->back();
            }
        }
        else{
            Toastr::warning('Видеокурс не найден!','Упс!');
            return  redirect(route("admin-course.index"));
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
        $course = Course::where("alias",$alias)->with("videos")->first();
        if($course){
            Storage::delete($course->img);
            $course->delete();
            Toastr::success('Курс был успешно удален','Успешно удален курс!');
            return redirect()->back();

        }
        else{
            Toastr::warning('Видеокурс не найден!','Упс!');
            return  redirect(route("admin-course.index"));
        }
    }

    //Course Videos
    public function videos($alias){
        $course = Course::where("alias",$alias)->first();
        if($course){

            $videos = Video::where("course_id",$course->id)->with(["course"])->paginate(12);
            return view("admin.media.video.index",compact("videos"));
        }
        else{
            Toastr::warning("Ничего не найдено","Упс!");
            return  redirect()->back();
        }
    }

    //Work With Subscriber

    public function subscribers($id){
            $subscribers = Subscriber::where(["course_id"=>$id,"status"=>1])->with(["course","user","author"])->paginate(12);
            if($subscribers->isNotEmpty()){
                return view("admin.media.course.subscriber",compact("subscribers"));
            }
            else{
                Toastr::warning("Подписчиков данного видеокурса не найдено","Упс!");
                return redirect()->back();
            }
    }

    public function unconfirmed($id){
        $subscribers = Subscriber::where(["course_id"=>$id,"status"=>0])->with(["course","user","author"])->paginate(12);
        if($subscribers->isNotEmpty()){
            return view("admin.media.course.subscriber",compact("subscribers"));
        }
        else{
            Toastr::warning("Подписчиков данного видеокурса не найдено","Упс!");
            return redirect()->back();
        }
    }


    public function subscriberAction($id)
    {
        $subscriber = Subscriber::find($id);
        if($subscriber){
            if ($subscriber->status == 1) {
                $subscriber->status = 0 ;
                $subscriber->save();
                return redirect()->back();
            }
            if ($subscriber->status == 0) {
                $subscriber->status = 1 ;
                $subscriber->save();
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function deleteSubscriber($id){
        $subscriber = Subscriber::find($id);
        if($subscriber)
        {
            $subscriber->delete();
            return redirect()->back();
        }
        else
        {
            Toastr::warning("Подписчик не найден","Упс");
            return  redirect()->back();
        }


    }


}
