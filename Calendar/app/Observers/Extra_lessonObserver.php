<?php

namespace App\Observers;

use App\Extra_lesson;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Classroom;
use App\View_weekly_lesson;
use Carbon\Carbon;


class Extra_lessonObserver
{
    /**
     * Handle the extra_lesson "created" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function created(Extra_lesson $extraLesson)
    {
        $day = Carbon::today()->dayOfWeek;
        $date = Carbon::today()->addDays( ( 7 - $day ) );
        
        $classroom = Classroom::find($extraLesson->classroom_id);
        $teaching = Teaching::find($extraLesson->teaching_id);
        
        if ( $date > $extraLesson->date_lesson )
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
     * Handle the extra_lesson "updated" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function updated(Extra_lesson $extraLesson)
    {
        //
    }

    /**
     * Handle the extra_lesson "deleted" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function deleted(Extra_lesson $extraLesson)
    {
        $lesson = DB::table('view_weekly_lessons')
        ->where('view_weekly_lessons.lesson_id', '=', $extraLesson->id )
        ->where('view_weekly_lessons.type', '=', 1)
        ->select( 'view_weekly_lessons.id' )
        ->get();

        $delete = App\ViewWeeklyLessonController::where('id', $lesson->id)->delete();       
    }
}
