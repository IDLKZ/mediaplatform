<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Result;
use App\Models\ReviewQuestion;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserRequest;
use App\Models\UserVideo;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use App\Models\Question;
class UserController extends Controller
{
    public function index()
    {
        return redirect(route('front'));
    }

    public function profile()
    {
        return view('student.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'phone' => 'sometimes|numeric', 'description' => 'sometimes|max:30', ]);
        User::updateUser($request, Auth::id());
        Toastr::success('Ваши личные данные обновлены!','Успешно!');
        return redirect()->back();
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
            'status' => true
        ]);
        Toastr::success('Вы успешно подписаны!','Успешно!');
        return redirect()->back();
    }

    public function singleCourse($alias)
    {
        $course = Course::with('author', 'subscribers', 'videos')->where('alias', $alias)->first();
        $subscribe = Subscriber::where(['course_id' => $course->id, 'user_id' => Auth::id()])->first();
        // Home
        Breadcrumbs::for('user', function ($trail) {
            $trail->push('Кабинет', route('userProfile'));
        });
        // Courses
        Breadcrumbs::for('courses', function ($trail) {
            $trail->parent('user');
            $trail->push(__('student.my_courses'), route('student.course'));
        });
        // Home > Courses > [Course]
        Breadcrumbs::for('showCourse', function ($trail, $course) {
            $trail->parent('courses');
            $trail->push($course->title, route('student.course.show', $course->alias));
        });
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
        $courses = Subscriber::where(['user_id' => Auth::id(), 'status' => 1])->with(['author', 'course', 'videos', 'results'])->paginate(10);

        if(count($courses)>0){
            return view("student.course.my-course",compact("courses"));
        }
        else{
            Toastr::warning('У вас еще нет подтвержденных курсов!','Упс...!');
            return redirect()->back();
        }
    }

    public function showCourse($alias){
        $course = Course::where("alias",$alias)->first();
        $subscribe = Subscriber::with(['uservideo', 'author', 'videos'])->where(['user_id' => Auth::id(), 'status' => 1, 'course_id' => $course->id])->first();
        // Home
        Breadcrumbs::for('user', function ($trail) {
            $trail->push('Кабинет', route('userProfile'));
        });
        // Courses
        Breadcrumbs::for('courses', function ($trail) {
            $trail->parent('user');
            $trail->push('Курсы', route('student.course'));
        });
        // Home > Courses > [Course]
        Breadcrumbs::for('showCourse', function ($trail, $course) {
            $trail->parent('courses');
            $trail->push($course->title, route('student.course.show', $course->alias));
        });
      if($subscribe){
//          $video_ids = $subscribe->uservideo()->pluck("video_id")->toArray();
          return view("student.course.course-show",compact("course","subscribe"));
      }
      else{
          Toastr::warning('У вас еще нет прав для этого курса!','Упс...!');
          return redirect(route("student.course"));
      }
    }

    public function showVideo($alias){
        $video = Video::where("alias",$alias)->first();
        $result = Result::where(["video_id"=>$video->id,"student_id"=>Auth::id()])->first();
        if($video){
         $video_access  =   UserVideo::where(["video_id"=>$video->id,"student_id"=>Auth::id()])->first();
            if($video_access){
                $video->load(["course","materials"]);
                $file = $video->watch($video->video_url);
                return  view("student.video.show",compact("video","file", 'result'));
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
        $results = Auth::user()->results_student()->paginate(15);
        return view("student.result.index",compact("results"));
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
        // Courses
        Breadcrumbs::for('exam', function ($trail) {
            $trail->push(__('front.exam'), route('student.checkedResult'));
        });
        // Home > Courses > [Course]
        Breadcrumbs::for('showResult', function ($trail, $course) {
            $trail->parent('exam');
            $trail->push($course->title, route('student.course.show', $course->alias));
        });
        Breadcrumbs::for('show', function ($trail, $result) {
            $trail->parent('showResult', $result->course);
            $trail->push($result->video->title, route('student.showResult', $result->id));
        });
        if($result){
            return view("student.result.show",compact("result"));
        }
        else{
            Toastr::warning("Не найден результат видео","Упс....");
            return redirect()->back();
        }
    }

    public function openVideo(){
        $uservideos = UserVideo::where("student_id",Auth::id())->pluck("video_id")->toArray();
        $allvideos = Video::whereIn("course_id",Auth::user()->subscribers->pluck("course_id")->toArray())->get();
        return view("student.video.openvideo",compact("uservideos","allvideos"));
    }

    public function getOpenVideo(Request  $request){
        $uservideos = UserVideo::where("student_id",Auth::id())->pluck("video_id")->toArray();
        $allvideos = Video::whereIn("course_id",Auth::user()->subscribers->pluck("course_id")->toArray())->pluck("id")->toArray();
        $userrequest = UserRequest::where(["user_id"=>Auth::id(), "video_id"=>$request->get("video_id")])->first();
        if(!in_array($request->get("video_id"),$uservideos) && in_array($request->get("video_id"),$allvideos) && !$userrequest){
            $data = $request->all(); $data["user_id"] = Auth::id();
            if(UserRequest::createData($data)){
                Toastr::success("Заявка успешно отправлена","Отлично!");
            }
            else{
                Toastr::warning("Произошла ошибка попробуйте позже","Упс");
            }
        }
        return redirect()->back();

    }




}
