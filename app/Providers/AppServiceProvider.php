<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\category;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
        //
        view()->composer('*',function($view){
            $result_category=category::get();
            $view->with(compact('result_category'));
        });
    }
}
