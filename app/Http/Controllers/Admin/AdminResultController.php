<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
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
        $result = Result::where("id",$id)->with(["student","author","course","video","examination"])->first();
        if($result){
            return  view("admin.result.edit",compact("result"));
        }
        else{
            Toastr::warning("Ничего не найдено","Упс");
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
        $this->validate($request,["result" => "required|min:0|max:10","status"=>"required"]);
        $result = Result::find($id);
        if($result){
            $input = $request->all();$input["checked"] = 1; $input["checked_day"] = now();
            $result->update($input);
            Toastr::success("Успешно обновлена информация","Отлично");
            return  redirect()->back();
        }
        else{
            Toastr::warning("Результат не найден","Упс");
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
        $result = Result::find($id);
        if($result){
            $result->delete();
            return  redirect()->back();
        }
        else{
            Toastr::warning("Не найден результат");
            return  redirect()->back();
        }
    }


    public function studentResult($id){
        $results = Result::where("student_id",$id)->with(["student","author","course","video","examination"])->orderBy("checked","asc")->paginate(12);
       if($results->isNotEmpty()){
           return  view("admin.user.result",compact("id","results"));
       }
       else{
           Toastr::warning("Результаты не найдены","Упс");
           return  redirect()->back();
       }


    }
}
