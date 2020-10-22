<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ReviewQuestion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class ReviewQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review_questions = Auth::user()->review_questions;
        if(count($review_questions)){
            return view("teacher.review_questions.index",compact("review_questions"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reviews = Auth::user()->reviews;
        if(count($reviews)){
            $validator = JsValidator::make( [
                "review_id"=>"required",
                'question'=> 'required',
            ]);
            return view("teacher.review_questions.create",compact("reviews","validator"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return redirect()->back();
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
            "review_id"=>"required",
            'question'=> 'required',
        ]);
        if(ReviewQuestion::saveData($request->all())){
            Toastr::success("Успешно создан вопрос","Отлично!");
            return redirect("review-question.index");
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
            return redirect("review-question.index");
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review_question = ReviewQuestion::find($id);
        $reviews = Auth::user()->reviews;
        if($review_question){
            $validator = JsValidator::make( [
                "review_id"=>"required",
                'question'=> 'required',
            ]);
            return view("teacher.review_questions.edit",compact("review_question","reviews","validator"));
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
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
        $review_question = ReviewQuestion::find($id);
        if($review_question){
            $this->validate($request, [
                "review_id"=>"required",
                'question'=> 'required',
            ]);
            if(ReviewQuestion::updateData($request->all(),$review_question)){
                Toastr::success("Успешно создан вопрос","Отлично!");
                return redirect()->back();
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect()->back();
            }
        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return redirect()->back();
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
        $review_question = ReviewQuestion::find($id);
        if($review_question){
            $review_question->delete();
                Toastr::success("Успешно удален вопрос","Отлично!");
                return redirect("review-question.index");


        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return redirect()->back();
        }
    }
}
