<?php

namespace App\Observers;

use App\Special_event;
use Illuminate\Support\Facades\DB;
use App\Teaching;
use App\Classroom;
use App\View_weekly_lesson;
use Carbon\Carbon;

class Special_eventObserver
{
    /**
     * Handle the special_event "created" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function created(Special_event $specialEvent)
    {
        $day = Carbon::today()->dayOfWeek;
        $date = Carbon::today()->addDays( ( 7 - $day ) );
        
        $classroom = Classroom::find($specialEvent->classroom_id);
        
        if ( ( $date > $specialEvent->date_event  ) && ( $specialEvent->date_event > Carbon::yesterday() ) )
        {
            DB::table('view_weekly_lessons')->insertGetId( [
                'lesson_id' => ($specialEvent->id),
                'classroom_id' => ($specialEvent->classroom_id),
                'week_day' => (Carbon::parse($specialEvent->date_event)->dayOfWeek),
                'type' => 2,
                'canceled' => 0,
                'start_time' => ($specialEvent->start_time),
                'duration' => ($specialEvent->duration),
                'classroom_name' => ($classroom->name)
                ]);
        }
    }

    /**
     * Handle the special_event "updated" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function updated(Special_event $specialEvent)
    {
        Special_eventObserver::deleted($specialEvent);
        Special_eventObserver::created($specialEvent); // i am the best programmer in the world
    }

    /**
     * Handle the special_event "deleted" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function deleted(Special_event $specialEvent)
    {
        $lesson = DB::table('view_weekly_lessons')
        ->where('view_weekly_lessons.lesson_id', '=', $specialEvent->id )
        ->where('view_weekly_lessons.type', '=', 2)
        ->select( 'view_weekly_lessons.id' )
        ->get();

        $delete = App\ViewWeeklyLessonController::where('id', $lesson->id)->delete();     
    }
}
