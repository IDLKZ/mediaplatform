<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::where("author_id",Auth::id())->with("author")->get();
        return  view("teacher.quiz.index",compact("quizzes"));
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
        ]);
        return view("teacher.quiz.create",compact("validator"));
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
        ]);
        if(Quiz::saveData($request->all())){
            Toastr::success("Успешно создан тест","Отлично!");
            return redirect()->back();
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
            return redirect()->back();
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

        $quiz = Quiz::find($id);

        if($quiz){
            $quiz = $quiz->load("questions");
            return  view("teacher.quiz.show",compact("quiz"));
        }
        else{
            Toastr::warning("Не найден тест","Упс....");
            return redirect()->back();
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
        $quiz = Quiz::find($id);
        if($quiz){
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
            ]);
            return  view("teacher.quiz.edit",compact("quiz","validator"));
        }
        else{
            Toastr::warning("Не найден тест","Упс....");
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required|max:255',
        ]);
        $quiz = Quiz::find($id);
        if($quiz){
            if(Quiz::updateData($request->all(),$quiz)){
                Toastr::success("Успешно обновлен тест","Отлично!");
                return redirect()->back();
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect()->back();
            }
        }
        else{
            return  redirect()->back();
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
           $quiz->delete();
            Toastr::success("Успешно удален тест","Отлично!");
            return  redirect()->back();
        }
        else{
            Toastr::warning("Не найден тест","Упс....");
            return redirect()->back();
        }
    }
}
