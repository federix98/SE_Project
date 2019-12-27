<?php

namespace App\Providers;
use App\Canceled_lesson;
use App\Observers\Canceled_lessonObserver;
use App\Extra_lesson;
use App\Observers\Extra_lessonObserver;
use App\Lesson;
use App\Observers\LessonObserver;
use App\Special_event;
use App\Observers\Special_eventObserver;

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
        Canceled_lesson::observe(Canceled_lessonObserver::class);
        Extra_lesson::observe(Extra_lessonObserver::class);
        Lesson::observe(LessonObserver::class);
        Special_event::observe(Special_eventObserver::class);
    }
}
