<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Result;
use App\Models\ReviewQuestion;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use App\Models\Question;
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
        Toastr::success('Успешно отменен!','Success!');
        return redirect()->back();
    }


    public function myCourse()
    {
        $subscribers = Auth::user()->subscribers()->where("status",1)->get();
        if(count($subscribers)>0){
            return view("student.course.my-course",compact("subscribers"));
        }
        else{
            Toastr::warning('У вас еще нет подтвержденных курсов!','Упс...!');
            return redirect()->back();
        }
    }

    public function showCourse($alias){
        $course = Course::where("alias",$alias)->first();
        $subscribe = Auth::user()->subscribers()->where(["course_id"=>$course->id,"status"=>1])->first();
      if($subscribe){
          $video_ids = $subscribe->uservideo()->pluck("video_id")->toArray();
          return view("student.course.course-show",compact("course","subscribe","video_ids"));
      }
      else{
          Toastr::warning('У вас еще нет прав для этого курса!','Упс...!');
          return redirect(route("student.course"));
      }
    }

    public function showVideo($alias){
        $video = Video::where("alias",$alias)->first();
        if($video){
         $video_access  =   UserVideo::where(["video_id"=>$video->id,"student_id"=>Auth::id()])->first();
            if($video_access){
                $video->load(["course","materials"]);
                $file = $video->watch($video->video_url);
                return  view("student.video.show",compact("video","file"));
            }
            else{
                Toastr::warning("У вас нет доступа к видео!","Упс");
                return redirect()->back();
            }
        }
        else{
                Toastr::warning("Видео не найдено!","Упс");
                return redirect()->back();
        }
    }

    public function passExam($alias){
        $video = Video::where("alias",$alias)->first();
        $result = Result::where(["video_id"=>$video->id,"student_id"=>Auth::id()])->first();
       if($video && !$result){
          if($video->examination){
              if($video->examination->quiz_id){
                  $data = Examination::getQuestions($video->examination->quiz_id,10);
                  return view("student.examination.quiz",compact("data","video"));

              }
              if($video->examination->review_id){
                  $data = ReviewQuestion::where("review_id",$video->examination->review_id)->get();
                  return  view("student.examination.review",compact("data","video"));
              }
          }
          else{
              Toastr::warning("Автор не задал опроса или теста после видеоурока","Упс...");
              return  redirect()->back();
          }


       }
       else{
           Toastr::warning("Вы сдали экзамен!","Упс");
           return redirect()->back();
       }
    }

    public function checkExam(Request $request){
        $this->validate($request,
            [
                "examination_id"=>"required", "student_id"=>"required", "author_id"=>"required",
                "course_id"=>"required", "video_id"=>"required",
                "answer"=>"required", "right"=>"required", "question"=>"required"
            ]
        );

        $data = Result::prepareData($request->all());
        if(Result::saveResult($data)){
            Toastr::success("Ваш результат отправлен на проверку учителя","Отлично!");
            return redirect(route("userProfile"));
        }
        else{
            Toastr::warning("Упс, что-то пошло не так","Упс....");
            return redirect(route("userProfile"));
        }

    }

    public function checkReview(Request $request){
        if(Result::saveResult($request->all())){
            Toastr::success("Ваш результат отправлен на проверку учителя","Отлично!");
            return redirect(route("userProfile"));
        }
        else{
            Toastr::warning("Упс, что-то пошло не так","Упс....");
            return redirect(route("userProfile"));
        }
    }

    public function checkedResult(){
        $results = Auth::user()->results_student()->where("checked",1)->paginate(15);
        if (!$results->isEmpty()) {
            return view("student.result.index",compact("results"));
        }
        else{
            Toastr::warning("Увы у вас нет проверенных работ","Упс....");
            return redirect()->back();
        }
    }

    public function uncheckedResult(){
       $results = Auth::user()->results_student()->where("checked",0)->paginate(15);
        if (!$results->isEmpty()) {
            return view("student.result.index",compact("results"));
        }
        else{
            Toastr::warning("Увы у вас нет проверенных работ","Упс....");
            return redirect()->back();
        }
    }

    public function showResult($id){
        $result = Auth::user()->results_student()->find($id);
        if($result){
            return view("student.result.show",compact("result"));
        }
        else{
            Toastr::warning("Не найден результат видео","Упс....");
            return redirect()->back();
        }


    }

}
