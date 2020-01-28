<?php

namespace App\Providers;

use App\Lesson;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Classroom;
use App\ViewWeeklyLesson;
use Carbon\Carbon;

class LessonObserver
{
    /**
     * Handle the lesson "created" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function created(Lesson $lesson)
    {
        if ( ($lesson->start_date < Carbon::today()->addDays(5) ) && ($lesson->end_date > Carbon::today()->subDays(5)) )
        {
            $classroom = Classroom::find($lesson->classroom_id);
            $teaching = Teaching::find($lesson->teaching_id);

            DB::table('view_weekly_lessons')->insertGetId( [
                'item_id' => ($lesson->id),
                'teaching_id' => ($lesson->teaching_id),
                'classroom_id' => ($lesson->classroom_id),
                'week_day' => ($lesson->week_day),
                'type' => 0,
                'canceled' => 0,
                'start_time' => ($lesson->start_time),
                'duration' => ($lesson->duration),
                'item_name' => ($teaching->name),
                'classroom_name' => ($classroom->name)
                ]);
        }
    }

    /**
     * Handle the lesson "updated" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function updated(Lesson $lesson)
    {
        LessonObserver::deleted($lesson);
        LessonObserver::created($lesson); 
    }

    /**
     * Handle the lesson "deleted" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function deleted(Lesson $lesson)
    {
        $viewLesson = DB::table('view_weekly_lessons')
        ->where('view_weekly_lessons.item_id', '=', $lesson->id )
        ->where('view_weekly_lessons.type', '=', 0)
        ->select( 'view_weekly_lessons.id' )
        ->get();

        $delete = App\ViewWeeklyLessonController::where('id', $viewLesson->id)->delete();  
    }
}
