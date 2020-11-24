<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{

    public function checkedResult(){
        $results = Result::where(["author_id"=>Auth::id(),"checked"=>1])->with(["student","author","course","video","examination"])->paginate(15);
        return view("teacher.result.index",compact("results"));



    }

    public function uncheckedResult(){
        $results = Result::where(["author_id"=>Auth::id(),"checked"=>0])->with(["student","author","course","video","examination"])->paginate(15);
        return view("teacher.result.index",compact("results"));


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

    public function deleteResult($id){
        $result = Auth::user()->results()->where("id",$id)->first();
        if($result){
            $result->delete();
        }
        else{
            Toastr::warning("Результат не найден","Упс...");
        }
        return redirect()->back();
    }

    public function checkResult(Request $request){
        $this->validate($request,["id"=>"required","result"=>"required|min:0|max:10"]);
        $result = Auth::user()->results()->find($request->get("id"));
        if($result){
            $data = $request->all();
            $data["checked"] = 1;
            $data["checked_day"] = date('Y-m-d H:i:s');
            if(Result::updateResult($data,$result)){
                Toastr::success("Успешно обновлено","Отлично!");
                return redirect()->back();
            }
            else{
                Toastr::warning("Что-то пошло не так", "Упс...!");
                return redirect()->back();
            }
        }
        else{
            Toastr::warning("Не найден результат экзамена", "Упс...!");
            return redirect()->back();
        }


    }




}
