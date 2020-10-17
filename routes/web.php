<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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


//Start AdminBlade
Route::group(['prefix' => 'admin'], function (){
    Route::get('/', [MainController::class, 'index'])->name('main');
});
//End AdminBlade




//Start TeacherBlade
//Route::group(['prefix' => 'teacher'], function (){
//    Route::get('/', [MainController::class, 'index'])->name('main');
//});
//End TeacherBlade




//Start StudentBlade
//Route::group(['prefix' => 'student'], function (){
//    Route::get('/', [MainController::class, 'index'])->name('main');
//});
//End StudentBlade
