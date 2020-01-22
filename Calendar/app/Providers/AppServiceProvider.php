<?php

namespace App\Providers;
use App\CanceledLesson;
use App\Observers\CanceledLessonObserver;
use App\ExtraLesson;
use App\Observers\ExtraLessonObserver;
use App\Lesson;
use App\Observers\LessonObserver;
use App\SpecialEvent;
use App\Observers\SpecialEventObserver;

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
        CanceledLesson::observe(CanceledLessonObserver::class);
        ExtraLesson::observe(ExtraLessonObserver::class);
        Lesson::observe(LessonObserver::class);
        SpecialEvent::observe(SpecialEventObserver::class);
    }
}
