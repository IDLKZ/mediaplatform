<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::where("author_id",Auth::id())->paginate(15);
        return  view("teacher.review.index",compact("reviews"));



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
        return  view("teacher.review.create",compact("validator"));
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
        if(Review::saveData($request->all())){
            Toastr::success("Успешно создан опрос","Отлично!");
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
        $review = Review::find($id);
        if($review){
            $validator = JsValidator::make( [
                'title'=> 'required|max:255',
            ]);
            return  view("teacher.review.edit",compact("review","validator"));
        }
        else{
            Toastr::warning("Не удалось найти","Упс...");
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
        $review = Review::find($id);
        if($review){
            $this->validate($request, [
                'title'=> 'required|max:255',
            ]);
            if(Review::updateData($request->all(),$review)){
                Toastr::success("Успешно обновлен опрос","Отлично!");
                return redirect()->back();
            }
            else{
                Toastr::warning("Что-то пошло не так","Упс...");
                return redirect()->back();
            }
        }
        else{
            Toastr::warning("Не удалось найти","Упс...");
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
        $review = Review::find($id);
        if($review){
           $review->delete();
           Toastr::success("Успешно удален опрос","Отлично!");
           return redirect()->back();
        }
        else{
            Toastr::warning("Не удалось найти","Упс...");
            return redirect()->back();
        }
    }
}
