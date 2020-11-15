<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RealtimeController;
use App\Http\Controllers\Student\UserController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\TeacherController;
use \App\Http\Controllers\Teacher\VideoController;
use \App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Teacher\ReviewController;
use App\Http\Controllers\Teacher\ReviewQuestionController;
use App\Http\Controllers\Teacher\ExaminationController;
use App\Http\Controllers\Teacher\AjaxController;
use App\Http\Controllers\Teacher\SubscriberController;
use App\Http\Controllers\Teacher\ResultController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminMaterialController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminResultController;
use App\Http\Controllers\Admin\AdminExaminationController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminReviewQuestionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'DONE';
});


Route::group(['prefix' => LocaleMiddleware::getLocale()], function(){
    Route::get('/', [FrontController::class, 'index'])->name('front');
    Route::get('/courses', [FrontController::class, 'courses'])->name('frontCourses');


    Route::get('/logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect(\route('front'));
    })->name('logout');


//Start Authorization
    Route::group(["middlerware" => "guest"],function (){
        Route::get('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/send-user-data', [RegisterController::class, 'store']);
        Route::get('/login', [LoginController::class,"login"])->name("login");
        Route::post('/sign-in', [LoginController::class,"signIn"])->name("sign-in");

        //Google Login
        Route::get('/sign-in-google', [LoginController::class,"googleLogin"])->name("sign-in-google");
        Route::get('/google-callback', [LoginController::class,"googleCallback"])->name("callback-google");



    });

//End Authorization
    Route::group(["middleware"=>"auth"],function(){


        //Start AdminBlade
        Route::group(['prefix' => 'admin',"middleware"=>"admin"], function (){
            //Index Page
            Route::get('/', [MainController::class, 'index'])->name('main');
            //Show User
            Route::get("/users",[MainController::class,"users"])->name("admin-users");
            Route::resource("/user",AdminUserController::class);
            Route::get("/administrators/{type?}",[MainController::class,"administrators"])->name("admin-managers");
            //Teacher
            Route::get("/teachers/{type?}",[MainController::class,"teachers"])->name("admin-teachers");
            Route::get("/teacher/{id}/subscribers",[MainController::class,"teacherSubscriber"])->name("admin-teacher-subscriber");
            Route::get("/teacher/{id}/courses",[MainController::class,"teacherCourse"])->name("admin-teacher-course");
            Route::get("/teacher/{id}/materials",[MainController::class,"teacherMaterial"])->name("admin-teacher-material");
            Route::get("/teacher/{id}/results",[MainController::class,"teacherResult"])->name("admin-teacher-result");
            //Student
            Route::get("/students/{type?}",[MainController::class,"students"])->name("admin-students");
            Route::get("/student/{id}/courses",[MainController::class,"studentCourse"])->name("admin-student-course");
            Route::get("/student/{id}/accessVideo",[MainController::class,"studentAccessVideo"])->name("admin-student-access-video");

            //Course
            Route::resource("/admin-course",AdminCourseController::class);
            Route::get("/admin-course-videos/{alias}",[AdminCourseController::class,"videos"])->name("admin-course-videos");
            //Course - Subscriber
            Route::get("/admin-course-subscribers/{id}",[AdminCourseController::class,"subscribers"])->name("admin-course-subscribers");
            Route::get("/admin-course-unconfirmed/{id}",[AdminCourseController::class,"unconfirmed"])->name("admin-course-unconfirmed");
            Route::get("/admin-subscribe-action/{id}",[AdminCourseController::class,"subscriberAction"])->name("admin-subscribe-action");
            Route::get("/admin-subscribe-delete/{id}",[AdminCourseController::class,"deleteSubscriber"])->name("admin-subscribe-delete");
            //Video
            Route::resource("/admin-video",AdminVideoController::class);
            //Video-Student
            Route::get("/admin-video-subscriber/{alias}",[AdminVideoController::class,"subscriber"])->name("admin-video-subscriber");
            Route::get("/admin-video-checked/{alias}",[AdminVideoController::class,"checked"])->name("admin-video-checked");
            Route::get("/admin-video-unchecked/{alias}",[AdminVideoController::class,"unchecked"])->name("admin-video-unchecked");
            Route::get("/admin-video-material/{alias}",[AdminVideoController::class,"material"])->name("admin-video-material");

            //Material
            Route::resource("/admin-material",AdminMaterialController::class);
            //Create
            Route::post("/Access",[MainController::class,"Access"])->name("admin-Access");
            //Results
            Route::resource("/admin-result",AdminResultController::class);
            Route::get("/student/{id}/results",[AdminResultController::class,"studentResult"])->name("admin-student-result");
            //VideoMaterial
            Route::get("/admin-media",[MainController::class,"media"])->name("admin-media");


            //Examination
            Route::get("/admin-exams",[MainController::class,"exams"])->name("admin-exams");
            Route::resource("/admin-examination",AdminExaminationController::class);
            Route::resource("/admin-quiz",AdminQuizController::class);
            Route::resource("/admin-question",AdminQuestionController::class);
            Route::resource("/admin-review",AdminReviewController::class);
            Route::resource("/admin-review-question",AdminReviewQuestionController::class);

            //Request
            Route::get("/admin-request",[MainController::class,"request"])->name("admin-request");
            Route::get("/admin-request-user",[MainController::class,"requestUser"])->name("admin-request-user");
            Route::get("/admin-request-result",[MainController::class,"requestResult"])->name("admin-request-result");


            //Search
            Route::get("/admin-search",[MainController::class,"search"])->name("admin-search");

            Route::get("/admin-search-user",[MainController::class,"searchUser"])->name("admin-search-user");
            Route::get("/admin-search-user-result",[MainController::class,"searchUserResult"])->name("admin-search-user-result");

            Route::get("/admin-search-media",[MainController::class,"searchMedia"])->name("admin-search-media");
            Route::get("/admin-search-media-result",[MainController::class,"searchMediaResult"])->name("admin-search-media-result");

            Route::get('/admin-search-question',[MainController::class,"searchQuestion"])->name("admin-search-question");
            Route::get('/admin-search-question-result',[MainController::class,"searchQuestionResult"])->name("admin-search-question-result");






        });
//End AdminBlade




//Start TeacherBlade
        Route::group(['prefix' => 'teacher',"middleware"=>"teacher"], function (){
            Route::get('/', [HomeController::class, 'index'])->name('home');
            Route::resource("/course",CourseController::class);
            Route::resource("/video",VideoController::class);
            Route::resource("/material",MaterialController::class);
            Route::resource("/quiz",QuizController::class);
            Route::resource("/question",QuestionController::class);
            Route::get("/question-excel-create",[QuestionController::class,"questionExcelCreate"])->name("question.excel-create");
            Route::post("/question-excel-load",[QuestionController::class,"questionExcelSave"])->name("question.excel-store");
            Route::resource("/review",ReviewController::class);
            Route::resource("/review-question",ReviewQuestionController::class);
            Route::resource("/examination",ExaminationController::class);

            //Start Profile
            Route::get('/profile', [TeacherController::class, 'profile'])->name('teacherProfile');
            Route::get('/profile-settings', [TeacherController::class, 'settings'])->name('teacherProfileSettings');
            Route::post('/update-profile-settings', [TeacherController::class, 'updateSetting'])->name('teacherProfileSettingsUpdate');
            //End Profile
            //Start Subscribers
            Route::get("/confirmed-subscribers",[SubscriberController::class,"confirmed"])->name("confirmed_subscribers");
            Route::get("/unconfirmed-subscribers",[SubscriberController::class,"unconfirmed"])->name("unconfirmed_subscribers");
            Route::get("/getAccessVideo/{id}",[SubscriberController::class,"getAccessVideo"])->name("getAccessVideo");
            Route::post("/saveAccessVideo",[SubscriberController::class,"saveAccessVideo"])->name("saveAccessVideo");
            Route::get('/subscribers', [TeacherController::class, 'subscribers'])->name('teacherSubscribers');
            Route::get('/access-subscriber/{id}', [TeacherController::class, 'accessSubscriber'])->name('accessSubscriber');
            Route::post('/delete-subscriber/{id}', [TeacherController::class, 'deleteSubscriber'])->name('deleteSubscriber');
            //End Subscribers

            //Check Student Result
            Route::get("/checked-result",[ResultController::class,"checkedResult"])->name("teacher.checkedResult");
            Route::get("/unchecked-result",[ResultController::class,"uncheckedResult"])->name("teacher.uncheckedResult");
            Route::get("/show-result/{id}",[ResultController::class,"showResult"])->name("teacher.showResult");
            Route::post("/check-result",[ResultController::class,"checkResult"])->name("teacher.checkResult");
            //




        });
//End TeacherBlade

        //only Ajax Query
        Route::post("/ajax/videos",[AjaxController::class,"getVideo"]);
        Route::post("/ajax/getType",[AjaxController::class,"getType"]);
        Route::post("/ajax/getTypes",[AjaxController::class,"getTypes"]);
        Route::get("/ajax/searchCourse",[AjaxController::class,"searchCourse"]);
        Route::post("/ajax/searchCourseVideo",[AjaxController::class,"searchCourseVideo"]);
        Route::get('/ajax/searchAuthor', [AjaxController::class,"searchAuthor"]);
        Route::get('/ajax/searchVideo', [AjaxController::class,"searchVideo"]);
        Route::get("/getdocument/{id}",[MaterialController::class,"download"])->name("material");

//Start StudentBlade
        Route::group(['prefix' => 'student',"middleware"=>"student"], function (){
            Route::get('/', [UserController::class, 'index'])->name('user');
            //Start Profile
            Route::get('/profile', [UserController::class, 'profile'])->name('userProfile');
            Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('userUpdateProfile');
            Route::get('/profile-settings', [UserController::class, 'settings'])->name('userProfileSettings');
            Route::post('/update-profile-settings', [UserController::class, 'updateSetting'])->name('userProfileSettingsUpdate');
            //End Profile
            //Course
            Route::get("/my-course",[UserController::class,"myCourse"])->name("student.course");
            Route::get("/show-course/{alias}",[UserController::class,"showCourse"])->name("student.course.show");
            Route::get("/show-video/{alias}",[UserController::class,"showVideo"])->name("student.video.show");
            Route::get("/passExam/{alias}",[UserController::class,"passExam"])->name("student.passExam");
            Route::post("/checkExam",[UserController::class,"checkExam"])->name("student.checkExam");
            Route::post("/checkReview",[UserController::class,"checkReview"])->name("student.checkReview");

            //Result
            Route::get("/checked-result",[UserController::class,"checkedResult"])->name("student.checkedResult");
            Route::get("/unchecked-result",[UserController::class,"uncheckedResult"])->name("student.uncheckedResult");
            Route::get("/show-result/{id}",[UserController::class,"showResult"])->name("student.showResult");

            //
            //Start SendSubscribe
            Route::get('/send-subscribe/{alias}', [UserController::class, 'subscribe'])->name('sendSubscribe');
            //End SendSubscribe

            //Start Courses
            Route::get('/single-course/{alias}', [UserController::class, 'singleCourse'])->name('userSingleCourse');
            Route::get('/my-requests', [UserController::class, 'requestSubscribe'])->name('userRequests');
            Route::post('/cancel-my-request/{id}', [UserController::class, 'cancelRequest'])->name('userCancelRequest');
            //End Courses
        });
//End StudentBlade
    });

//    Start RealTime Chat
    Route::get('/realtime-forums', [RealtimeController::class, 'index'])->name('forums');

});
//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');
