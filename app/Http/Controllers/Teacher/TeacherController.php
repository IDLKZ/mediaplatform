<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscriber;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.main');
    }

    public function profile()
    {
        return view('teacher.profile.index');
    }

    public function settings()
    {

        return view('teacher.profile.settings');
    }

    public function updateSetting(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => Rule::unique('users')->ignore(Auth::user()), 'password' => 'required|min:6', 'avatar' => 'sometimes|image|max:4096']);
        User::updateProfile($request);
        Toastr::success('Ваши личные данные обновлены!','Успешно!');
        return redirect()->back();
    }


}
