<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;

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
		view()->composer('*', function($view){
            $theme = Cookie::get('theme');
            if ($theme != 'dark' && $theme != 'light'){
                $theme = 'light';
            }
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
            $view->with('theme', $theme);
        });
    }
}
