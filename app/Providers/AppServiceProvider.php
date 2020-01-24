<?php

namespace App\Providers;

use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        view()->composer('*', function ($view) {
            $user_msg_count = Message::where('to_user', Auth::id())->where('seen', 0)->count();
            $view->with('user_msg_count', $user_msg_count);
        });
        /*
        $msg_count = Message::where('to_user', Auth::id())->where('seen', 0)->count();
        View::share('key', Auth::user()->id);
        */

        Schema::defaultStringLength(191);
    }
}
