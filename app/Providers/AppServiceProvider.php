<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\BlogNews;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogNewsObserver;
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
        //
        Paginator::useBootstrap();
        //наделяю модели обсерверами
        BlogNews::observe(BlogNewsObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
    }
}
