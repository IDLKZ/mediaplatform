<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = Quiz::all();
        if(!$quizzes->isEmpty()){
            $validator = JsValidator::make( [
                'quiz_id'=>'required',
                'question'=> 'required',
                'A'=> 'required|max:255',
                'B'=> 'required|max:255',
                'C'=> 'required|max:255',
                'D'=> 'required|max:255',
                'E'=> 'required|max:255',
                "answer"=>"required|in:A,B,C,D,E"
            ]);
            return view("admin.exams.question.create",compact("validator","quizzes"));
        }
        else{
            Toastr::warning("Сначала создайте тест","Упс....");
            return  redirect(route("admin-quiz.create"));
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
            'quiz_id'=>'required',
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
            return redirect(route("admin-question.create"));
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
            return redirect(route("admin-question.create"));
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
        $question = Question::with("quiz")->find($id);
        $quizzes = Quiz::all();
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
            return  view("admin.exams.question.edit",compact("quizzes","question","validator"));
        }
        else{
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
    public function update(Request $request, $id)
    {
        $question =Question::find($id);
        if($question){
            $this->validate($request, [
                "quiz_id"=>"required",
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
                return redirect()->back();
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect()->back();
            }

        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect(route("question.index"));
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
        //
    }
}
