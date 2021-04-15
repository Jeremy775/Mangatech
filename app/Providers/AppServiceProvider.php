<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

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
        Builder::defaultStringLength(191);

        view()->composer('anime.index', function ($view)
        {
            $view->with('tags', Tag::has('anime')->pluck('slug' , 'name'));
        });

        view()->composer('manga.index', function ($view)
        {
            $view->with('tags', Tag::has('manga')->pluck('slug' , 'name'));
        });
        
    }
}
