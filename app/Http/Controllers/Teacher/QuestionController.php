<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Imports\QuestionsImport;
use App\Models\Question;
use App\Models\Quiz;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
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
        $questions = Question::where("author_id",Auth::id())->paginate(60);
        if($questions){
            return  view("teacher.exams.question.index",compact("questions"));
        }
        else{
            Toastr::warning("Вопросы не найдены","Упс...");
            return  redirect(route("question.index"));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $quizzes = Auth::user()->quiz;
        if(!$quizzes->isEmpty()){
            $validator = JsValidator::make( [
                'question'=> 'required',
                'A'=> 'required|max:255',
                'B'=> 'required|max:255',
                'C'=> 'required|max:255',
                'D'=> 'required|max:255',
                'E'=> 'required|max:255',
                "answer"=>"required|in:A,B,C,D,E"
            ]);
            return view("teacher.exams.question.create",compact("validator","quizzes"));
        }
        else{
            Toastr::warning("Сначала создайте тест","Упс....");
            return  redirect(route("quiz.create"));
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
            return redirect(route("question.create"));
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
            return redirect(route("question.index"));
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
            return view("teacher.exams.question.show",compact("question","quizzes"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect(route("question.index"));
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

        $question = Auth::user()->questions()->find($id);
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
            return view("teacher.exams.question.edit",compact("question","validator","quizzes"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect(route("question.index"));
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

        $question = Auth::user()->questions()->find($id);
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
                return redirect(route("question.index"));
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect(route("question.index"));
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
        $question = Auth::user()->questions()->find($id);
        if($question){
            $question->delete();
            Toastr::success("Успешно удален вопрос","Отлично");
            return  redirect(route("question.index"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return  redirect(route("question.index"));
        }
    }

    public function questionExcelCreate(){
        $quizzes = Auth::user()->quiz;
        if(count($quizzes)>0){
            $validator = JsValidator::make( [
                "quiz_id"=>"required",
                "file"=>"required|file|mimes:xls,xlsx|max:1024"
            ]);
            return view("teacher.exams.question.excel",compact("quizzes","validator"));
        }
        else {
            Toastr::warning("Создайте тему вопроса","Упс...");
            return  redirect(route("question.index"));
        }
    }

    public function questionExcelSave(Request  $request){
        $this->validate($request, [
            "quiz_id"=>"required",
            "file"=>"required|file|mimes:xls,xlsx|max:1024"
        ]);
        if(Excel::import(new QuestionsImport($request->get("quiz_id")), $request->file("file"))){
            Toastr::success("Успешно выполнен импорт тестов Excel!","Отлично!");
            return redirect()->back();
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс....");
            return redirect()->back();
        }

    }


}
