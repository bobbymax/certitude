<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Breadcrumb;

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
        view()->composer('layouts.partials.aside', function($view) {
            $view->with('menus', \App\Menu::where('active', 1)->oldest()->get());
        });

        view()->composer('layouts.partials.breadcrumb', function($view) {
            $view->with('breadcrumb', (new Breadcrumb(url()->current()))->rollout());
        });
    }
}
