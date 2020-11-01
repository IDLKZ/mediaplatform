<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.main');
    }
}
