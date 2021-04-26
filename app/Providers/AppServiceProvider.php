<?php

namespace App\Providers;

use App\Models\Channel;
use App\Models\Discussion;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\View;

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
        // migration string lenght
        Builder::defaultStringLength(191);

        // filter by tag
        view()->composer('anime.index', function ($view)
        {
            $view->with('tags', Tag::has('anime')->pluck('slug' , 'name'));
        });

        view()->composer('manga.index', function ($view)
        {
            $view->with('tags', Tag::has('manga')->pluck('slug' , 'name'));
        });
        
        // forum variables can be called on all pages
        View::share('channels', Channel::all());
        View::share('discussions', Discussion::all());
    }
}
