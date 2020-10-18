<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Student\UserController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\TeacherController;

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
Route::get('/', function (){
    return view('welcome');
});
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect(\route('login'));
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
        Route::get('/', [MainController::class, 'index'])->name('main');
    });
//End AdminBlade




//Start TeacherBlade
    Route::group(['prefix' => 'teacher',"middleware"=>"teacher"], function (){
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource("/course",CourseController::class);
        //Start Profile
        Route::get('/profile', [TeacherController::class, 'profile'])->name('teacherProfile');
        Route::get('/profile-settings', [TeacherController::class, 'settings'])->name('teacherProfileSettings');
        Route::post('/update-profile-settings', [TeacherController::class, 'updateSetting'])->name('teacherProfileSettingsUpdate');
        //End Profile

        //Start Subscribers
        Route::get('/subscribers', [TeacherController::class, 'subscribers'])->name('teacherSubscribers');
        Route::get('/access-subscriber/{id}', [TeacherController::class, 'accessSubscriber'])->name('accessSubscriber');
        Route::post('/delete-subscriber/{id}', [TeacherController::class, 'deleteSubscriber'])->name('deleteSubscriber');
        //End Subscribers
    });
//End TeacherBlade




//Start StudentBlade
    Route::group(['prefix' => 'student',"middleware"=>"student"], function (){
        Route::get('/', [UserController::class, 'index'])->name('user');
        //Start Profile
        Route::get('/profile', [UserController::class, 'profile'])->name('userProfile');
        Route::get('/profile-settings', [UserController::class, 'settings'])->name('userProfileSettings');
        Route::post('/update-profile-settings', [UserController::class, 'updateSetting'])->name('userProfileSettingsUpdate');
        //End Profile

        //Start SendSubscribe
        Route::get('/send-subscribe/{alias}', [UserController::class, 'subscribe'])->name('sendSubscribe');
        //End SendSubscribe

    });
//End StudentBlade
});

