<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with("author")->paginate(12);
        return  view("admin.exams.quiz.index",compact("quizzes"));
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
            'author_id'=>"required"
        ]);
        return view("admin.exams.quiz.create",compact("validator"));
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
            "author_id"=>"required",
        ]);
        if(Quiz::saveData($request->all())){
            Toastr::success("Успешно создан тест","Отлично!");
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
        }
        return redirect(route("admin-quiz.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::where("quiz_id",$id)->paginate(60);
        return view("admin.exams.quiz.show",compact("questions"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::with("author")->find($id);
        if($quiz){
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
                'author_id'=>"required"
            ]);
            return view("admin.exams.quiz.edit",compact("quiz","validator"));
        }
        else{
            return redirect(route("admin-quiz.index"));

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
        $this->validate($request, [
            'title'=> 'required|max:255',
            "author_id"=>"required"
        ]);
        $quiz = Quiz::find($id);
        if($quiz){
            if(Quiz::updateData($request->all(),$quiz)){
                Toastr::success("Успешно обновлен тест","Отлично!");
                return redirect(route("admin-quiz.index"));

            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect(route("admin-quiz.index"));

            }
        }
        else{
            return redirect(route("admin-quiz.index"));

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
        $quiz = Quiz::find($id);
        if($quiz){
            Toastr::success("Успешно удалено");
            $quiz->delete();
        }
        return redirect(route("admin-quiz.index"));


    }
}
