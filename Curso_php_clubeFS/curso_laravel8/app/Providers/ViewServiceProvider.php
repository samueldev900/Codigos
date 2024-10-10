<?php

namespace App\Providers;

use App\View\Composers\HomeComposer;
use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('home', HomeComposer::class);
    }
}
