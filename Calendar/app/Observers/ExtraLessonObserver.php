<?php

namespace App\Observers;

use App\ExtraLesson;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Classroom;
use App\ViewWeeklyLesson;
use Carbon\Carbon;


class ExtraLessonObserver
{
    /**
     * Handle the ExtraLesson "created" event.
     *
     * @param  \App\ExtraLesson  $extraLesson
     * @return void
     */
    public function created(ExtraLesson $extraLesson)
    {
        $day = Carbon::today()->dayOfWeek;
        $date = Carbon::today()->addDays( ( 7 - $day ) );
        
        $classroom = Classroom::find($extraLesson->classroom_id);
        $teaching = Teaching::find($extraLesson->teaching_id);
        
        if ( ( $date > $extraLesson->date_lesson ) && ( $extraLesson->date_lesson > Carbon::yesterday() ))
        {
            DB::table('view_weekly_lessons')->insertGetId( [
                'lesson_id' => ($extraLesson->id),
                'teaching_id' => ($extraLesson->teaching_id),
                'classroom_id' => ($extraLesson->classroom_id),
                'week_day' => (Carbon::parse($extraLesson->date_lesson)->dayOfWeek),
                'type' => 1,
                'canceled' => 0,
                'start_time' => ($extraLesson->start_time),
                'duration' => ($extraLesson->duration),
                'teaching_name' => ($teaching->name),
                'classroom_name' => ($classroom->name)
                ]);
        } 
    }

    /**
     * Handle the ExtraLesson "updated" event.
     *
     * @param  \App\ExtraLesson  $extraLesson
     * @return void
     */
    public function updated(ExtraLesson $extraLesson)
    {
        ExtraLessonObserver::deleted($extraLesson);
        ExtraLessonObserver::created($extraLesson); // i am the best programmer in the world
    }

    /**
     * Handle the ExtraLesson "deleted" event.
     *
     * @param  \App\ExtraLesson  $extraLesson
     * @return void
     */
    public function deleted(ExtraLesson $extraLesson)
    {
        $lesson = DB::table('view_weekly_lessons')
        ->where('view_weekly_lessons.lesson_id', '=', $extraLesson->id )
        ->where('view_weekly_lessons.type', '=', 1)
        ->select( 'view_weekly_lessons.id' )
        ->get();

        $delete = App\ViewWeeklyLessonController::where('id', $lesson->id)->delete();       
    }
}
