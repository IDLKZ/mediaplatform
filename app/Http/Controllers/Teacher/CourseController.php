<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FileDownloader;
use App\Models\Language;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where(["author_id"=>Auth::user()->id])->paginate(8);
        return  view("teacher.course.index",compact("courses"));

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
            'subtitle'=> 'required|max:500',
            "requirement"=>"required",
            'img' => 'sometimes|image|max:10000',
        ]);
        $languages = Language::all();
        return view("teacher.course.create",compact("languages","validator"));
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
        $course = Course::where(["alias"=>$alias,"author_id"=>Auth::user()->id])->first();
        if($course){
            $course->load(["language","author"]);
            return  view("teacher.course.show",compact("course"));
        }
        else{
            Toastr::warning('Видеокурс не найден!','Упс!');
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
        $validator = JsValidator::make( [
            'title'=> 'required|max:255',
            'subtitle'=> 'required|max:500',
            "requirement"=>"required",
            "description"=>"required",
            'img' => 'sometimes|image|max:10000',
        ]);
        $course = Course::where(["alias"=>$alias,"author_id"=>Auth::user()->id])->first();
        if($course){
            $course->load(["language","author"]);
            $languages = Language::all();
            return  view("teacher.course.edit",compact("course","languages","validator"));
        }
        else{
            Toastr::warning('Видеокурс не найден!','Упс!');
            return  redirect()->back();
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

        $course = Course::where(["alias"=>$alias,"author_id"=>Auth::user()->id])->first();
        if($course){
            $this->validate($request, [
                'title'=> 'required|max:255',
                'subtitle'=> 'required|max:500',
                "requirement"=>"required|max:255",
                "description"=>"required",
                'img' => 'sometimes|image|max:2000',
            ]);
            if(Course::updateData($request,$course)){
                Toastr::success('Курс был успешно изменен','Успешно изменен курс!');
                return redirect()->back();
            }
            else{
                Toastr::warning('Произошла ошибка, попробуйте позже!','Упс!');
                return redirect()->back();
            }
        }
        else{
            Toastr::warning('Видеокурс не найден!','Упс!');
            return  redirect(route("course.index"));
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
        $course = Course::where(["alias"=>$alias,"author_id"=>Auth::user()->id])->first();
        if($course){
           Storage::delete($course->img);
           $course->delete();
            Toastr::success('Курс был успешно удален','Успешно удален курс!');
            return redirect()->back();

        }
        else{
            Toastr::warning('Видеокурс не найден!','Упс!');
            return  redirect(route("course.index"));
        }
    }
}
