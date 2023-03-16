<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\GenarelSetting;
use App\Models\Notice;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        view()->share('settings', GenarelSetting::find(1)->first());
        view()->share('blogProvider', Blog::where("is_active", 1)->take(4)->get());
        view()->share('noticeProvider', Notice::where("is_active", 1)->take(4)->get());
        view()->share('courseProvider', Course::where("is_active", 1)->take(4)->get());
    }
}
