<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materials;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Materials::orderBy("created_at","desc")->with("video")->paginate(15);
        return  view("admin.media.material.index",compact("materials"));





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
        $videos = Video::count();
        if($videos){
            return  view("admin.media.material.create",compact("videos","validator"));
        }
        else{
            Toastr::warning("Вы еще не создали видео","Упс...");
            return  redirect(route("admin-video.create"));
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
            return redirect(route("admin-material.index"));
        }
        else{
            Toastr::warning("Кажись, что-то пошло не так","Упс...");
            return redirect(route("admin-material.index"));
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
        $material = Materials::find($id);
        if($material){
            $validator = JsValidator::make( [
                "video_id"=>"required",
                'title'=> 'required|max:255',
                'file'=> 'sometimes|file|max:5000',
                "type"=>"required",
            ]);
            return  view("admin.media.material.edit",compact("material","validator"));
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
            return  redirect(route("admin-material.index"));
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
            }
            else{
                Toastr::warning("Кажись, что-то пошло не так","Упс...");
            }
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
        }
        return  redirect(route("admin-material.index"));
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
        }
        else{
            Toastr::warning('Материал не найден!','Упс!');
        }
        return  redirect(route("admin-material.index"));

    }
}
