<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewQuestion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminReviewQuestionController extends Controller
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
        $reviews = Review::all();
        if($reviews->isNotEmpty()){
            return  view("admin.exams.review_question.create",compact('reviews'));
        }
        else{
            Toastr::warning("Создайте сначала опрос!","Упс");
            return  redirect()->back();
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
        $review_question =ReviewQuestion::find($id);
        $reviews = Review::all();
        if($review_question){
            $validator = JsValidator::make( [
                "review_id"=>"required",
                'question'=> 'required',
            ]);
            return view("admin.exams.review_question.edit",compact("review_question","reviews","validator"));
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
        $review_question =  ReviewQuestion::find($id);
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
        $review_question =  ReviewQuestion::find($id);
        if($review_question){
            Toastr::success("Успешно удалено","Упс...");
            $review_question->delete();
            return  redirect()->back();
        }
        else{
            return  redirect()->back();
        }
    }
}
