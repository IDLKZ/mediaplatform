<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('student.layout');
    }

    public function profile()
    {
        return view('student.profile.index');
    }
}
