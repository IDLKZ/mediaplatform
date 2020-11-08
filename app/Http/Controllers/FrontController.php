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

    public function courses()
    {
        $courses = Course::with(['author'])->where('status', 1)->paginate(12);
        return view('Frontend.courses', compact('courses'));
    }
}
