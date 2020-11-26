<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view("admin.news.category.index",compact("categories"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["title"=>"required"]);
        return  view("admin.news.category.create",compact("validator"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["title"=>"required|min:0|max:255"]);
        if(Category::createData($request->all())){
            Toastr::success("Успешно создана категория","Отлично");
        }
        else{
            Toastr::warning("Ошибка создания категории","Упс...");
        }
        return redirect(route("admin-category.index"));

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
        $category = Category::find($id);
        if($category){
            $validator = JsValidator::make(["title"=>"required"]);
            return  view("admin.news.category.edit",compact("validator","category"));
        }
        else{
            Toastr::warning("Категория не найдена","Упс");
            return redirect(route("admin-category.index"));
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
        $category = Category::find($id);
        if($category){
            $this->validate($request,["title"=>"required"]);
            if(Category::updateData($category,$request->all())){
                Toastr::success("Успешно обновлена информация","Отлично");
            }
            else{Toastr::warning("Что-то пошло не так, попробуйте позжу","Упс");}
        }
            return redirect(route("admin-category.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
           $category->delete();
           Toastr::success("Успешно удалена категория","Отлично");
        }
        return redirect(route("admin-category.index"));
    }
}
