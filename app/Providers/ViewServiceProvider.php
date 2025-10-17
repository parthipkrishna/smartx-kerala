<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Course;

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
         View::composer('web.layouts.layout', function ($view) {
             $view->with([
                 'categories' => Category::all(),
                 'courses' => Course::latest()->take(3)->get(),
             ]);
         });
     }
     
}
