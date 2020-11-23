<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('Frontend.index');
    }

    public function about()
    {
        return view('Frontend.about');
    }

    public function courses()
    {
        $courses = Course::with(['author'])->where('status', 1)->paginate(12);
        return view('Frontend.courses', compact('courses'));
    }

    public function exam()
    {
        return view('Frontend.exam');
    }

    public function discussion()
    {
        return view('Frontend.discussion');
    }

    public function certificate()
    {
        return view('Frontend.certificate');
    }
}
