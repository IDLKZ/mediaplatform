<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Auth::user()->questions;
        if($questions){
            return  view("teacher.question.index",compact("questions"));
        }
        else{
            Toastr::warning("Вопросы не найдены","Упс...");
            return  redirect("question.index");
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $quizzes = $user->quiz;
        if(count($quizzes)){
            $validator = JsValidator::make( [
                'question'=> 'required',
                'A'=> 'required|max:255',
                'B'=> 'required|max:255',
                'C'=> 'required|max:255',
                'D'=> 'required|max:255',
                'E'=> 'required|max:255',
                "answer"=>"required|in:A,B,C,D,E"
            ]);
            return view("teacher.question.create",compact("validator","quizzes"));
        }
        else{
            Toastr::warning("Сначала создайте тест","Упс....");
            return  redirect("question.index");
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
            'question'=> 'required',
            'A'=> 'required|max:255',
            'B'=> 'required|max:255',
            'C'=> 'required|max:255',
            'D'=> 'required|max:255',
            'E'=> 'required|max:255',
            "answer"=>"required|in:A,B,C,D,E"
        ]);
        if(Question::saveData($request->all())){
            Toastr::success("Успешно создан вопрос","Отлично!");
            return redirect("question.index");
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
            return redirect("question.index");
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
        $question = Question::find($id);
        if($question){
            $user = Auth::user();
            $quizzes = $user->quiz;
            return view("teacher.question.show",compact("question","quizzes"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect("question.index");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $quizzes = Auth::user()->quiz;
        if($question){
            $validator = JsValidator::make( [
                'question'=> 'required',
                'A'=> 'required|max:255',
                'B'=> 'required|max:255',
                'C'=> 'required|max:255',
                'D'=> 'required|max:255',
                'E'=> 'required|max:255',
                "answer"=>"required|in:A,B,C,D,E"
            ]);
            return view("teacher.question.edit",compact("question","validator","quizzes"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect("question.index");
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

        $question = Question::find($id);
        if($question){
            $this->validate($request, [
                'question'=> 'required',
                'A'=> 'required|max:255',
                'B'=> 'required|max:255',
                'C'=> 'required|max:255',
                'D'=> 'required|max:255',
                'E'=> 'required|max:255',
                "answer"=>"required|in:A,B,C,D,E"
            ]);
            if(Question::updateData($request->all(),$question)){
                Toastr::success("Успешно обновлен вопрос","Отлично!");
                return redirect("question.index");
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect("question.index");
            }

        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect("question.index");
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
        $question = Question::find($id);
        if($question){
            $question->delete();
            Toastr::success("Успешно удален вопрос","Отлично");
            return  redirect("question.index");
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect("question.index");
        }
    }
}
