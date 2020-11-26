<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::with(["course","video","quiz","review","author"])->paginate(12);
        return view("admin.exams.examination.index",compact("examinations"));

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
        $courses = Course::count();
        if($courses > 0){
            return  view("admin.exams.examination.create",compact("validator"));
        }
        else{
            Toastr::warning("Сначала создайте видеокурс", "Упс...");
            return  redirect(route("admin-course.create"));
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
        $examination = Examination::where(["course_id"=>$request->get("course_id"),"video_id"=>$request->get("video_id")])->first();
        if(!$examination){
            if(Examination::saveData($request->all())){
                Toastr::success('Экзамен был успешно создан','Успешно создан курс!');
                return redirect(route('admin-examination.index'));
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Examination::find($id);
        if($examination){
            $examination->delete();
            Toastr::success("Экзамен успешно удален","Упс");
            return  redirect()->back();
        }
        else{
            Toastr::warning("Экзамен не найден","Упс");
            return  redirect()->back();
        }
    }
}
