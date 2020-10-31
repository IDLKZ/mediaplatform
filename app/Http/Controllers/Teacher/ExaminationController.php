<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
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
        $examinations = Auth::user()->examinations;
        if(count($examinations)>0){
            return  view("teacher.examination.index",compact("examinations"));
        }
        else{
            Toastr::warning('У вас еще нет созданных эказменов!','Упс!');
            return  redirect()->back();
        }

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
            "course_id"=>"required",
            "video_id"=>"required",
            'file' => 'sometimes|file|max:2048',
        ]);
        $courses = Auth::user()->courses;
        return  view("teacher.examination.create",compact("courses","validator"));
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
            "course_id"=>"required",
            "video_id"=>"required",
            'file' => 'sometimes|file|max:2048',
        ]);
            $examination = Examination::where(["course_id"=>$request->get("course_id"),"video_id"=>$request->get("video_id"),"author_id"=>Auth::id()])->first();
        if(!$examination){
            if(Examination::saveData($request->all())){
                Toastr::success('Экзамен был успешно создан','Успешно создан курс!');
                return redirect(route('examination.index'));
            }
            else{
                Toastr::warning('Произошла ошибка, попробуйте позже!','Упс!');
                return redirect()->back();
            }
        }
        else{
            Toastr::warning('Вы уже добавили экзамен на данное видео!','Упс!');
            return  redirect()->back();
        }


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
        $examination = Examination::where(["id"=>$id,"author_id"=>Auth::id()])->first();
        if($examination){
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
                "course_id"=>"required",
                "video_id"=>"required",
                'file' => 'sometimes|file|max:2048',
            ]);
            $courses = Auth::user()->courses;
            return view("teacher.examination.edit",compact("examination","validator","courses"));
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
        $examination = Examination::where(["id"=>$id,"author_id"=>Auth::id()])->first();
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
        $examination = Examination::where(["id"=>$id,"author_id"=>Auth::id()])->first();
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
