<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\View_weekly_lesson;

class EventCalendarController extends Controller
{
  public function __invoke(Request $request)
  {
    View_weekly_lesson::truncate();

    $lessons = DB::table('lessons')
    ->whereDate('lessons.start_date', '<', Carbon::today()->addDays(5))
    ->whereDate('lessons.end_date', '>', Carbon::today()->subDays(5))
    ->select(
        'lessons.id as lesson_id',
        'lessons.teaching_id',
        'lessons.classroom_id',
        'lessons.week_day',
        'canceled_lessons.id as canceled',
        'lessons.start_time',
        'lessons.duration',
        'teachings.name as teaching_name',
        'classrooms.name as classroom_name')
    ->leftJoin('canceled_lessons', 'lessons.id', 'canceled_lessons.lesson_id')
    ->join('classrooms', 'lessons.classroom_id', '=', 'classrooms.id')
    ->join('teachings', 'lessons.teaching_id', '=', 'teachings.id')
    ->get();

    foreach ($lessons as $lesson) {
        if ( is_null($lesson->canceled) ) { $lesson->canceled = 0; }
        else { $lesson->canceled = 1; }
        
        DB::table('view_weekly_lessons')->insertGetId( [
            'lesson_id' => ($lesson->lesson_id),
            'teaching_id' => ($lesson->teaching_id),
            'classroom_id' => ($lesson->classroom_id),
            'week_day' => ($lesson->week_day),
            'canceled' => ($lesson->canceled),
            'start_time' => ($lesson->start_time),
            'duration' => ($lesson->duration),
            'teaching_name' => ($lesson->teaching_name),
            'classroom_name' => ($lesson->classroom_name)
            ]);
    }
      // and then make $schedule->call(new EventCalendarController)->weekly();
  }
}