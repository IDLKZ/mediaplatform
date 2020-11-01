<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Language;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $courses = Course::orderBy("created_at","desc")->paginate(12);
        if(!$courses->isEmpty()){
            return  view("admin.course.index",compact("courses"));
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
            return  view("admin.course.create",compact("languages","validator"));
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
            return redirect(route('course.index'));
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
        $course = Course::where("alias",$alias)->first();
        $languages = Language::all();
        if($course && !$languages->isEmpty()){
            return  view("admin.course.show",compact("course","languages"));
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
            return  view("admin.course.edit",compact("course","validator","languages"));
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
        $course = Course::where("alias",$alias)->first();
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
}
