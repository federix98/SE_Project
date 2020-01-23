<?php

namespace App\Observers;

use App\CanceledLesson;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Classroom;
use App\ViewWeeklyLesson;
use Carbon\Carbon;

class Canceled_lessonObserver
{
    /**
     * Handle the CanceledLesson "created" event.
     *
     * @param  \App\CanceledLesson  $canceledLesson
     * @return void
     */
    public function created(CanceledLesson $canceledLesson)
    {
        $day = Carbon::today()->dayOfWeek;
        $date = Carbon::today()->addDays( ( 7 - $day ) );

        if ( ( $date > $canceledLesson->date_lesson ) && ( $canceledLesson->date_lesson > Carbon::yesterday() ) )
        {
            $viewLesson = DB::table('view_weekly_lessons')
            ->where('view_weekly_lessons.lesson_id', '=', $canceledLesson->lesson_id )
            ->where('view_weekly_lessons.type', '=', 0)
            ->update(['canceled' => 1]);
        }
    }

    /**
     * Handle the CanceledLesson "updated" event.
     *
     * @param  \App\CanceledLesson  $canceledLesson
     * @return void
     */
    public function updated(CanceledLesson $canceledLesson)
    {
        CanceledLessonObserver::deleted($canceledLesson);
        CanceledLessonObserver::created($canceledLesson); // i am the best programmer in the world
    }

    /**
     * Handle the CanceledLesson "deleted" event.
     *
     * @param  \App\CanceledLesson  $canceledLesson
     * @return void
     */
    public function deleted(CanceledLesson $canceledLesson)
    {
        $day = Carbon::today()->dayOfWeek;
        $date = Carbon::today()->addDays( ( 7 - $day ) );

        if ( $date > $canceledLesson->date_lesson )
        {
            $viewLesson = DB::table('view_weekly_lessons')
            ->where('view_weekly_lessons.lesson_id', '=', $canceledLesson->lesson_id )
            ->where('view_weekly_lessons.type', '=', 0)
            ->update(['canceled' => 0]);
        }
    }
}
