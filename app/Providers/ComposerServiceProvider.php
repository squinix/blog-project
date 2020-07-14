<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            $headerData = Post::orderBy('updated_at', 'desc')->limit('2')->get();
            $view->headerData = $headerData;
        });
    }
}
