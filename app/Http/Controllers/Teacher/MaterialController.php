<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Materials;
use App\Models\User;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $materials = $user->materials;
        return  view("teacher.material.index",compact("materials"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make( [
            "video_id"=>"required",
            'title'=> 'required|max:255',
            'file'=> 'sometimes|file|max:5000',
            "type"=>"required",
        ]);
        $user = User::find(Auth::id());
        $videos = $user->videos;
        return  view("teacher.material.create",compact("videos","validator"));
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
            "video_id"=>"required",
            'title'=> 'required|max:255',
            'file'=> 'sometimes|file|max:5000',
            "type"=>"required",
        ]);
        if(Materials::saveMaterial($request)){
            Toastr::success("Успешно добавлены материалы","Ура!");
            return redirect()->back();
        }
        else{
            Toastr::success("Кажись, что-то пошло не так","Упс...");
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(Auth::id());
        $videos = $user->videos;
        $material = Materials::find($id);
        if($material && $videos){
            $validator = JsValidator::make( [
                "video_id"=>"required",
                'title'=> 'required|max:255',
                'file'=> 'sometimes|file|max:5000',
                "type"=>"required",
            ]);
            return  view("teacher.material.edit",compact("material","videos","validator"));
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
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

        $material = Materials::find($id);
        if($material){
            $this->validate($request, [
                "video_id"=>"required",
                'title'=> 'required|max:255',
                'file'=> 'sometimes|file|max:5000',
                "type"=>"required",
            ]);
            if(Materials::updateMaterial($request,$material)){
                Toastr::success("Успешно изменены материалы","Ура!");
                return redirect()->back();
            }
            else{
                Toastr::success("Кажись, что-то пошло не так","Упс...");
                return redirect()->back();
            }
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
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
        $material = Materials::find($id);
        if($material){
            if(Storage::disk("materials")->exists($material->file)){
             Storage::disk("materials")->delete($material->file);
            }
            $material->delete();
            Toastr::success("Успешно удалены материалы","Ура!");
            return redirect()->back();
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
            return  redirect()->back();
        }
    }

    public function download($id){

        $material = Materials::find($id);
        return response()->download(storage_path('/materials/' . $material->file));



    }
}