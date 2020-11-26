<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $news = News::with('category')->take(3)->get();
        return view('Frontend.index', compact('news'));
    }

    public function singlePost($alias)
    {
        $news = News::where('alias', $alias)->with(['author', 'category'])->first();
        if ($news) {
            return view('Frontend.single-post', compact('news'));
        }
        abort(404);
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
