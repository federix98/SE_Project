<?php

namespace App\Observers;

use App\Canceled_lesson;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Classroom;
use App\View_weekly_lesson;
use Carbon\Carbon;

class Canceled_lessonObserver
{
    /**
     * Handle the canceled_lesson "created" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function created(Canceled_lesson $canceledLesson)
    {
        $day = Carbon::today()->dayOfWeek;
        $date = Carbon::today()->addDays( ( 7 - $day ) );

        if ( $date > $canceledLesson->date_lesson )
        {
            $viewLesson = DB::table('view_weekly_lessons')
            ->where('view_weekly_lessons.lesson_id', '=', $canceledLesson->lesson_id )
            ->where('view_weekly_lessons.type', '=', 0)
            ->update(['canceled' => 1]);
        }
    }

    /**
     * Handle the canceled_lesson "updated" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function updated(Canceled_lesson $canceledLesson)
    {
        //
    }

    /**
     * Handle the canceled_lesson "deleted" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function deleted(Canceled_lesson $canceledLesson)
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
