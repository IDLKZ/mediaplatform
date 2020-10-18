<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscriber;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class UserController extends Controller
{
    public function index()
    {
        $courses = Course::with('author')->paginate(12);
        return view('student.main', compact('courses'));
    }

    public function profile()
    {
        return view('student.profile.index');
    }

    public function settings()
    {

        return view('student.profile.settings');
    }

    public function updateSetting(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => Rule::unique('users')->ignore(Auth::user()), 'password' => 'required|min:6', 'avatar' => 'sometimes|image|max:4096']);
        User::updateProfile($request);
        Toastr::success('Ваши личные данные обновлены!','Успешно!');
        return redirect()->back();
    }

    public function subscribe($alias)
    {
        $course = Course::where('alias', $alias)->first();
        if (Subscriber::where(['course_id' => $course->id, 'user_id' => Auth::id()])->first()) {
            Toastr::warning('Вы уже отправили подписку на этот курс!','Sorry...!');
            return redirect()->back();
        }
        Subscriber::create([
            'course_id' => $course->id,
            'author_id' => $course->author_id,
            'user_id' => Auth::id(),
            'status' => false
        ]);
        Toastr::success('Ваша заявка отправлена!','Успешно!');
        return redirect()->back();
    }

    public function singleCourse($alias)
    {
        $course = Course::with('author')->where('alias', $alias)->first();
        $subscribe = Subscriber::where(['course_id' => $course->id, 'user_id' => Auth::id()])->first();
        if ($subscribe) {
            $link['link'] = $subscribe->status ? 'javascript:void(0)' : route('sendSubscribe', $course->alias);
            $link['color'] = $subscribe->status ? 'success' : 'info';
            $link['text'] = $subscribe->status ? 'Подписан' : 'Подписаться';
        } else {
            $link['link'] = route('sendSubscribe', $course->alias);
            $link['color'] = 'info';
            $link['text'] = 'Подписаться';
        }
        return view('student.course.single-course', compact('course', 'link'));
    }

    public function requestSubscribe()
    {
        $subscribers = Subscriber::with(['author', 'course'])->where('status', false)->get();
        return view('student.subscribe.index', compact('subscribers'));
    }

    public function cancelRequest($id)
    {
        Subscriber::find($id)->delete();
        Toastr::info('Успешно отменен!','Success!');
        return redirect()->back();
    }
}
