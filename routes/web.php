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
use App\Http\Controllers\Teacher\SearchController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminNewsController;
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
    Route::group(["middleware" => "guest"],function (){
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


        //Начало работы администратора
        Route::group(['prefix' => 'admin',"middleware"=>"admin"], function (){
            //1.Главная страница
            Route::get('/', [MainController::class, 'index'])->name('main');

            //2.Все пользователи
            Route::get("/users",[MainController::class,"users"])->name("admin-users");

            //2.1 Создание, изменение, удаление пользователей
            Route::resource("/user",AdminUserController::class);

            //2.2Администратор
            Route::get("/administrators/{type?}",[MainController::class,"administrators"])->name("admin-managers");

            //2.3 Учитель
            Route::get("/teachers/{type?}",[MainController::class,"teachers"])->name("admin-teachers");
            //2.3.1 Подписчики учителя
            Route::get("/teacher/{id}/subscribers",[MainController::class,"teacherSubscriber"])->name("admin-teacher-subscriber");
            //2.3.2. Курсы учителя
            Route::get("/teacher/{id}/courses",[MainController::class,"teacherCourse"])->name("admin-teacher-course");
            //2.3.3 Курсы преподавателя
            Route::get("/teacher/{id}/materials",[MainController::class,"teacherMaterial"])->name("admin-teacher-material");
            //2.3.4 Задачи преподавателя
            Route::get("/teacher/{id}/results",[MainController::class,"teacherResult"])->name("admin-teacher-result");


            //2.4 Студент
            Route::get("/students/{type?}",[MainController::class,"students"])->name("admin-students");
            //2.4.1 Курсы у студента
            Route::get("/student/{id}/courses",[MainController::class,"studentCourse"])->name("admin-student-course");
            //2.4.2 Открыть доступ к видео
            Route::get("/student/{id}/accessVideo",[MainController::class,"studentAccessVideo"])->name("admin-student-access-video");
            Route::post("/Access",[MainController::class,"Access"])->name("admin-Access");
            //2.4.3 Результаты у студента
            Route::get("/student/{id}/results",[AdminResultController::class,"studentResult"])->name("admin-student-result");
            //2.4.4 Запросы на откртытие видео у студента



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

            //Results
            Route::resource("/admin-result",AdminResultController::class);
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
            Route::get("/admin-request-video",[MainController::class,"requestVideo"])->name("admin-request-video");
            Route::get("/admin-request-uservideo/{id}",[MainController::class,"userVideo"])->name("admin-request-uservideo");


            //Search
            Route::get("/admin-search",[MainController::class,"search"])->name("admin-search");

            Route::get("/admin-search-user",[MainController::class,"searchUser"])->name("admin-search-user");
            Route::get("/admin-search-user-result",[MainController::class,"searchUserResult"])->name("admin-search-user-result");

            Route::get("/admin-search-media",[MainController::class,"searchMedia"])->name("admin-search-media");
            Route::get("/admin-search-media-result",[MainController::class,"searchMediaResult"])->name("admin-search-media-result");

            Route::get('/admin-search-question',[MainController::class,"searchQuestion"])->name("admin-search-question");
            Route::get('/admin-search-question-result',[MainController::class,"searchQuestionResult"])->name("admin-search-question-result");

            //Новости
            Route::get('/admin-media-news', [MainController::class,"news"])->name("admin-media-news");
            Route::resource('/admin-category',AdminCategoryController::class);
            Route::resource('/admin-news',AdminNewsController::class);



        });
//End AdminBlade




//Start TeacherBlade
        Route::group(['prefix' => 'teacher',"middleware"=>"teacher"], function (){
            Route::get('/', [HomeController::class, 'index'])->name('home');
            //Задачи
            Route::get("/teacher-tasks",[HomeController::class,"tasks"])->name("teacher-tasks");
            //Начало работы со слушателем
            Route::get("/teacher-users",[HomeController::class,"users"])->name("teacher-users");
            //Start Subscribers
            //Подтвержденные слушатели на курс
            Route::get("/confirmed-subscribers",[SubscriberController::class,"confirmed"])->name("confirmed_subscribers");
            //Неподтвержденные слушатели на курс
            Route::get("/unconfirmed-subscribers",[SubscriberController::class,"unconfirmed"])->name("unconfirmed_subscribers");
            //Дать доступ к видео
            Route::get("/listRequestVideo",[SubscriberController::class,"listRequestVideo"])->name("listRequestVideo");
            Route::get("/requestVideo/{id}",[SubscriberController::class,"requestVideo"])->name("requestVideo");
            Route::get("/getAccessVideo/{id}",[SubscriberController::class,"getAccessVideo"])->name("getAccessVideo");
            Route::post("/saveAccessVideo",[SubscriberController::class,"saveAccessVideo"])->name("saveAccessVideo");
            //Все подписчики
            Route::get('/subscribers', [SubscriberController::class, 'subscribers'])->name('teacherSubscribers');
            //Информация о подписчике
            Route::get('/subscriber/{id}', [SubscriberController::class, 'subscriber'])->name('teacherSubscriber');
            //Курсы преподавателя у Студента
            Route::get("/subscriber/{id}/course",[SubscriberController::class,"course"])->name("teacherSubscriberCourse");
            //Список открытых видео у курсов преподавателя у студента
            Route::get("/subscriber/{id}/access",[SubscriberController::class,"access"])->name("teacherSubscriberAccess");
            Route::post("/subscriber/giveAccessToVideo",[SubscriberController::class,"giveAccessToVideo"])->name("giveAccessToVideo");
            //Список видео преподавателя у студента
            Route::get("/subscriber/{id}/video",[SubscriberController::class,"video"])->name("teacherSubscriberVideo");
            //Список результатов видео преподавателя у ученика
            Route::get("/subscriber/{id}/result",[SubscriberController::class,"result"])->name("teacherSubscriberResult");
            //Разрешить, удалить, отменить подписку
            Route::get('/access-subscriber/{id}', [SubscriberController::class, 'accessSubscriber'])->name('accessSubscriber');
            Route::get('/delete-subscriber/{id}', [SubscriberController::class, 'deleteSubscriber'])->name('deleteSubscriber');
            Route::get('/cancel-subscriber/{id}', [SubscriberController::class, 'cancelSubscriber'])->name('cancelSubscriber');
            //End Subscribers


            //Начало работы с медиа
            Route::get("/teacher-media",[HomeController::class,"media"])->name("teacher-media");
            //Курс преподавателя
            Route::resource("/course",CourseController::class);
            //Список подписчиков курса подписанные и в заявке
            Route::get("/course-subscribe/{id}",[CourseController::class,"subscriber"])->name("course-subscriber");
            Route::get("/course-request/{id}",[CourseController::class,"request"])->name("course-request");

            //Видео преподавателя
            Route::resource("/video",VideoController::class);
            //Слушатели преподавателя
            Route::get("/video-subscriber/{alias}",[VideoController::class,"subscriber"])->name("video-subscriber");
            //Задания видеоурока
            Route::get("/video-result/{alias}/checked",[VideoController::class,"checked"])->name("video-result-checked");
            Route::get("/video-result/{alias}/unchecked",[VideoController::class,"unchecked"])->name("video-result-unchecked");
            //Видео материалы
            Route::get("/video-result/{alias}/material",[VideoController::class,"material"])->name("video-material");

            //Материалы к видео
            Route::resource("/material",MaterialController::class);

            //Начало работы с экзаменами
            Route::get("/teacher-exams",[HomeController::class,"exams"])->name("teacher-exams");
            //Тесты
            Route::resource("/quiz",QuizController::class);
            //Вопросы к тестам
            Route::resource("/question",QuestionController::class);
            //Загрузка вопросов через Excel
            Route::get("/question-excel-create",[QuestionController::class,"questionExcelCreate"])->name("question.excel-create");
            Route::post("/question-excel-load",[QuestionController::class,"questionExcelSave"])->name("question.excel-store");
            //Опросы
            Route::resource("/review",ReviewController::class);
            //Вопросы к опросам
            Route::resource("/review-question",ReviewQuestionController::class);
            //Экзамены
            Route::resource("/examination",ExaminationController::class);
            //Проверка результатов
            Route::get("/checked-result",[ResultController::class,"checkedResult"])->name("teacher.checkedResult");
            Route::get("/unchecked-result",[ResultController::class,"uncheckedResult"])->name("teacher.uncheckedResult");
            Route::get("/show-result/{id}",[ResultController::class,"showResult"])->name("teacher.showResult");
            Route::post("/check-result",[ResultController::class,"checkResult"])->name("teacher.checkResult");
            Route::post("/delete-result/{id}",[ResultController::class,"deleteResult"])->name("teacher.deleteResult");

            //Начало работы с запросами
            Route::get("/teacher-request",[HomeController::class,"request"])->name("teacher-request");

            //Работа с профилем
            Route::get('/profile', [TeacherController::class, 'profile'])->name('teacherProfile');
            Route::get('/profile-settings', [TeacherController::class, 'settings'])->name('teacherProfileSettings');
            Route::post('/update-profile-settings', [TeacherController::class, 'updateSetting'])->name('teacherProfileSettingsUpdate');
            //Конец работы с профилем
            //Начало работы в поиске
            Route::get("/teacher-search",[HomeController::class,"search"])->name("teacher-search");
            //Поиск подписчика
            Route::get("/teacher-search-subscriber",[SearchController::class,"subscriber"])->name("teacher-search-subscriber");
            Route::get("/teacher-search-subscriber-result",[SearchController::class,"subscriberResult"])->name("teacher-search-subscriber-result");
            //Поиск материала
            Route::get("/teacher-search-media",[SearchController::class,"media"])->name("teacher-search-media");
            Route::get("/teacher-search-media-result",[SearchController::class,"mediaResult"])->name("teacher-search-media-result");
            //Поиск вопросов
            Route::get("/teacher-search-question",[SearchController::class,"question"])->name("teacher-search-question");
            Route::get("/teacher-search-question-result",[SearchController::class,"questionResult"])->name("teacher-search-question-result");







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
            Route::get("/open-video",[UserController::class,"openVideo"])->name("open-video");
            Route::post("/get-open-video",[UserController::class,"getOpenVideo"])->name("get-open-video");
            //End Courses
        });
//End StudentBlade

        //    Start Forums
        Route::get('/realtime-forums', [RealtimeController::class, 'index'])->name('forums');
        Route::post('/add-discussion', [RealtimeController::class, 'addDiscussion']);
        Route::get('/single-categories/{slug}', [RealtimeController::class, 'singleCategory'])->name('singleCategory');
        Route::get('/single-post/{alias}', [RealtimeController::class, 'singlePost'])->name('singlePost');
        Route::post('/send-comment', [RealtimeController::class, 'sendComment']);
    });


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
