<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Result;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        if ($course->videos->count() != 0) {
            if (Result::where(['student_id' => Auth::id(), 'course_id' => $course_id, 'status' => 1])->count() == $course->videos->count()) {
                $certificate = Certificate::where(['user_id' => Auth::id(), 'course_id' => $course_id])->first();
                if ($certificate) {
                    $student = Auth::user();
                    return view('student.certificate.certificate', compact('student', 'course'));
                } else {
                    Certificate::create([
                        'course_id' => $course_id,
                        'user_id' => Auth::id()
                    ]);
                    $student = Auth::user();
                    return view('student.certificate.certificate', compact('student', 'course'));
                }
            } else {
                $certificate = Certificate::where(['user_id' => Auth::id(), 'course_id' => $course_id])->first();
                if ($certificate) {
                    $certificate->delete();
                }
                Toastr::error('Вы до конца не прошли курс!','Ошибка...!');
                return redirect(route("student.course"));
            }
        }
        return abort(404);
    }

    public function certificates()
    {
        $certificates = Certificate::with('course')->paginate(10);
        return view('student.certificate.my-certificates', compact('certificates'));
    }
}
