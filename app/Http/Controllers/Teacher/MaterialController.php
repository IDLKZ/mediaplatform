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
        $materials = Materials::where("author_id",Auth::id())->with(["author","video"])->paginate(15);
        if (!$materials->isEmpty()) {
            return  view("teacher.media.material.index",compact("materials"));
        }
        else{
            Toastr::warning("Материалов еще нет!","Упс....");
            return  redirect(route("material.create"));
        }

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
        $videos = Auth::user()->videos;
        if(!$videos->isEmpty()){
            return  view("teacher.media.material.create",compact("videos","validator"));
        }
        else{
            Toastr::warning("Вы еще не создали видео","Упс...");
            return  redirect(route("video.create"));
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
            Toastr::warning("Кажись, что-то пошло не так","Упс...");
            return redirect(route("material.create"));
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
        return  abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos = Auth::user()->videos;
        $material = Auth::user()->materials()->find($id);
        if($material && !$videos->isEmpty()){
            $validator = JsValidator::make( [
                "video_id"=>"required",
                'title'=> 'required|max:255',
                'file'=> 'sometimes|file|max:5000',
                "type"=>"required",
            ]);
            return  view("teacher.media.material.edit",compact("material","videos","validator"));
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
            return  redirect(route("material.create"));
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

        $material = Auth::user()->materials()->find($id);
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
                Toastr::warning("Кажись, что-то пошло не так","Упс...");
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
        $material = Auth::user()->materials()->find($id);
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
