<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FileDownloader;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminUserController extends Controller
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
        $validator = JsValidator::make( [
            "role_id"=>"required",
            'name'=> 'required|max:255',
            'phone'=> 'required|max:255',
            "password"=>"required|min:4|max:255",
            "img"=>"sometimes|image|max:2048",
        ]);
        return view("admin.user.create",compact("validator"));
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
            "role_id"=>"required",
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users,email|max:255',
            'phone'=> 'required|max:255',
            "password"=>"required|min:4|max:255",
            "img"=>"sometimes|image|max:2048",
        ]);
        if(User::saveUser($request)){
            Toastr::success("Успешно создан пользователь","Отлично!");
            return redirect()->back();
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс");
            return  redirect()->back();
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
        $user = User::find($id);
        if($user){
            if ($user->role_id == 1) {
                return  redirect(route("user.edit",$id));
            }
            if($user->role_id == 2){
                $user->load(["courses","author_subscribers","materials","examinations"]);
                return view("admin.user.teacher.info",compact("user"));
            }
            if($user->role_id == 3)
            {
                $user->load(["uservideo","subscribers","results_student"]);
                return view("admin.user.student.info",compact("user"));
            }
        }
        else{return  redirect()->back();}






    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user){
            $validator = JsValidator::make( [
                'name'=> 'required|max:255',
                'phone'=> 'required|max:255',
                "password"=>"sometimes|min:4|max:255",
                "img"=>"sometimes|image|max:2048",
            ]);
            $user->load("role");
            return  view("admin.user.edit",compact("user","validator"));
        }
        else{
            Toastr::warning("Ничего не найдено","Упс...");
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
        $this->validate($request, [
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users,email,'.$id.'|max:255',
            'phone'=> 'required|max:255',
            "password"=>"sometimes|nullable|min:4|max:255",
            "img"=>"sometimes|image|max:2048",
        ]);
        if(User::updateUser($request,$id)){
            Toastr::success("Успешно создан пользователь","Отлично!");
            return redirect(route("user.show",$id));
        }
        else{
            Toastr::warning("Что-то пошло не так","Упс");
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
        $user = User::find($id);
        if(Auth::id() != $id && $user){
           FileDownloader::deleteFile($user->img);
           if($user->delete()){
               Toastr::success("Успешно удален пользователь","Успешно!");
               return redirect()->back();
           }
           else{
               Toastr::warning("Что-то пошло не так","Упс!");
               return redirect()->back();
            }
        }
        else{
            if(Auth::id() == $id){Toastr::warning("Вы не можете удалять самого себя!","Упс");}
            return  redirect()->back();
        }

    }
}
