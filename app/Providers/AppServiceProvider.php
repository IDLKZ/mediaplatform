<?php

namespace App\Providers;

use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        Carbon::setLocale(config('app.locale'));
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
