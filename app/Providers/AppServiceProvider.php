<?php

namespace App\Providers;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('teacher.header', function($view){
            $view->with('subscribers', Subscriber::where(['author_id' => Auth::id(), 'status' => false])->count());
        });
        view()->composer('student.header', function($view){
            $view->with('subscribers', Subscriber::where(['user_id' => Auth::id(), 'status' => false])->count());
        });
        view()->composer('student.header', function($view){
            $view->with('courses', Subscriber::where(['user_id' => Auth::id(), 'status' => true])->count());
        });
    }
}
