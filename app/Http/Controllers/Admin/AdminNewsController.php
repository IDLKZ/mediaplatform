<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FileDownloader;
use App\Models\Language;
use App\Models\News;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with(["author","category"])->paginate(12);
        return  view("admin.news.news.index",compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $languages = Language::all();
        $validator = JsValidator::make( [
            "category_id"=>"required",
            "language_id"=>"required",
            'title'=> 'required|max:255',
            "description"=>"required",
            'img'=> 'required|image|max:2048',
            'thumbnail'=> 'required|image|max:2048',
        ]);
        return view("admin.news.news.create",compact("categories","languages","validator"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "category_id"=>"required",
            "language_id"=>"required",
            'title'=> 'required|max:255',
            "description"=>"required",
            'img'=> 'required|image|max:2048',
            'thumbnail'=> 'required|image|max:2048',
        ]);
        if (News::createData($request)) {
            Toastr::success("Успешно создана новость","Отлично");
        }
        else{
            Toastr::warning("При создании новости произошла ошибка","Упс");
        }
        return  redirect(route("admin-news.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        $news = News::where("alias",$alias)->with(["category","author","language"])->first();
        if($news)
        {
            return  view("admin.news.news.show",compact("news"));
        }
        return  redirect(route("admin-news.index"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
        $news = News::where("alias",$alias)->with("category")->first();
        if($news){
            $validator = JsValidator::make( [
                "category_id"=>"required",
                "language_id"=>"required",
                'title'=> 'required|max:255',
                "description"=>"required",
                'img'=> 'sometimes|image|max:2048',
                'thumbnail'=> 'sometimes|image|max:2048',
            ]);
            $categories = Category::all();
            $languages = Language::all();
            return  view("admin.news.news.edit",compact("news","categories","languages","validator"));
        }
        return  redirect(route("admin-news.index"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alias)
    {
        $news = News::where("alias",$alias)->first();
        if($news){
            $this->validate($request,[
                "category_id"=>"required",
                "language_id"=>"required",
                'title'=> 'required|max:255',
                "description"=>"required",
                'img'=> 'sometimes|image|max:2048',
                'thumbnail'=> 'sometimes|image|max:2048',
            ]);
            if (News::updateData($news,$request)) {
                Toastr::success("Успешно создана новость","Отлично");
            }
            else{
                Toastr::warning("При создании новости произошла ошибка","Упс");
            }
        }
        return  redirect(route("admin-news.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alias)
    {
        $news = News::where("alias",$alias)->first();
        if($news){
            FileDownloader::deleteFile($news->img);
            FileDownloader::deleteFile($news->thumbnail);
            $news->delete();
            Toastr::success("Успешно удалено","Отлично!");
        }
        return  redirect(route("admin-news.index"));
    }
}
