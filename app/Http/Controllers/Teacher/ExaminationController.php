<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $examinations = Examination::where("author_id",Auth::id())->with(["course","video","quiz","review","author"])->orderBy("created_at","desc")->paginate(15);
        return  view("teacher.exams.examination.index",compact("examinations"));



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
            "course_id"=>"required|exists:courses,id",
            "video_id"=>"required|exists:videos,id",
            'file' => 'sometimes|file|max:2048',
        ]);
        $courses = Auth::user()->courses;
        if(!$courses->isEmpty()){
            return  view("teacher.exams.examination.create",compact("courses","validator"));
        }
        else{
            Toastr::warning("Сначала создайте видеокурс", "Упс...");
            return  redirect(route("course.create"));
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
            'title'=> 'required|max:255',
            "course_id"=>"required|exists:courses,id",
            "video_id"=>"required|exists:videos,id",
            'file' => 'sometimes|file|max:2048',
        ]);
            $examination = Auth::user()->examinations()->where(["course_id"=>$request->get("course_id"),"video_id"=>$request->get("video_id")])->first();
        if(!$examination){
            if(Examination::saveData($request->all())){
                Toastr::success('Экзамен был успешно создан','Успешно создан курс!');
            }
            else{
                Toastr::warning('Произошла ошибка, попробуйте позже!','Упс!');
            }
        }
        else{
            Toastr::warning('Вы уже добавили экзамен на данное видео!','Упс!');
        }
        return redirect(route('examination.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examination = Examination::where(["author_id"=>Auth::id(),"id"=>$id])->with(["course","video","quiz","review","author"])->first();
        if($examination){
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
                "course_id"=>"required",
                "video_id"=>"required",
                'file' => 'sometimes|file|max:2048',
            ]);
            $courses = Auth::user()->courses;
            return view("teacher.exams.examination.edit",compact("examination","validator","courses"));
        }
        else{
            Toastr::warning('Не найден экзамен!','Упс!');
            return redirect(route("examination.index"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $examination = Auth::user()->examinations()->find($id);
        if($examination){
            $this->validate($request, [
                'title'=> 'required|max:255',
                "course_id"=>"required",
                "video_id"=>"required",
                'file' => 'sometimes|file|max:2048',
            ]);
            if(Examination::updateData($request->all(),$examination)){
                Toastr::success('Успешно изменен экзамен!','Отлично!');
                return redirect(route("examination.index"));
            }
            else{
                Toastr::warning('Что-то пошло не так!','Упс!');
                return redirect(route("examination.index"));
            }


        }
        else{
            Toastr::warning('Не найден экзамен!','Упс!');
            return redirect(route("examination.index"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Auth::user()->examinations()->find($id);
        if($examination){
            $examination->delete();
            Toastr::success('Успешно удален экзамен!','Отлично!');
            return redirect(route("examination.index"));
        }
        else{
            Toastr::warning('Не найден экзамен!','Упс!');
            return redirect(route("examination.index"));
        }

    }


}
