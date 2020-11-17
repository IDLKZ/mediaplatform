<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        return view('teacher.main');
    }

    //users

    public function users(){
        return view("teacher.user.index");
    }

    public function media(){
        return view("teacher.media.index");
    }

    public function exams(){
        return view("teacher.exams.index");
    }

    public function request(){
        return view("teacher.request.index");
    }

    public function search(){
        return view("teacher.search.index");
    }


}
