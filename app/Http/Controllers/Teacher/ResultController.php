<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{

    public function checkedResult(){
        $results = Auth::user()->results()->where("checked",1)->get();
        if(count($results)>0){
            return view("teacher.result.checked",compact("results"));
        }
        else{
            Toastr::warning("Вы еще не проверяли ни одного задания","Упс....");
            return redirect()->back();
        }

    }

    public function uncheckedResult(){
        $results = Auth::user()->results()->where("checked",0)->get();
        if(count($results)>0){
            return view("teacher.result.checked",compact("results"));
        }
        else{
            Toastr::warning("Вы еще не проверяли ни одного задания","Упс....");
            return redirect()->back();
        }
    }

    public function showResult($id){
        $result = Auth::user()->results()->where("id",$id)->first();
        if($result){
            return  view("teacher.result.show",compact("result"));
        }
        else{
            Toastr::warning("Результат не найден","Упс...");
            return redirect()->back();
        }
    }




}
