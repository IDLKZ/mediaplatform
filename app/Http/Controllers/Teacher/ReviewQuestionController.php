<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Review;
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
        $review_questions = ReviewQuestion::whereIn("review_id",Review::where("author_id",Auth::id())->pluck("id")->toArray())->with("review")->paginate(15);
        return view("teacher.exams.review_questions.index",compact("review_questions"));


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
            return view("teacher.exams.review_questions.create",compact("reviews","validator"));
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
            return redirect(route("review-question.index"));;
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс...");
            return redirect(route("review-question.index"));;
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
        $review_question = Auth::user()->review_questions()->find($id);
        $reviews = Auth::user()->reviews;
        if($review_question){
            $validator = JsValidator::make( [
                "review_id"=>"required",
                'question'=> 'required',
            ]);
            return view("teacher.exams.review_questions.edit",compact("review_question","reviews","validator"));
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
        $review_question =  Auth::user()->review_questions()->find($id);
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
        $review_question =  Auth::user()->review_questions()->find($id);
        if($review_question){
            $review_question->delete();
                Toastr::success("Успешно удален вопрос","Отлично!");
                return redirect()->back();


        }
        else{
            Toastr::warning("Вопрос не найден","Упс...");
            return redirect()->back();
        }
    }
}
