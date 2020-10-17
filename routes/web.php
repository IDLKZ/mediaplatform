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
Route::group(["middlerware"=>"guest"],function (){
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class,"login"])->name("login");
});


//End Authorization


//Start AdminBlade
Route::group(['prefix' => 'admin'], function (){
    Route::get('/', [MainController::class, 'index'])->name('main');
});
//End AdminBlade
