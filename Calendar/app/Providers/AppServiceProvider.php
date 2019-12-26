<?php

namespace App\Providers;

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
        Post::observe(Canceled_lessonObserver::class);
        Post::observe(Extra_lessonObserver::class);
        Post::observe(LessonObserver::class);
        Post::observe(Special_eventObserver::class);
    }
}
