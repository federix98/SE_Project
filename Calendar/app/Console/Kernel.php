<?php

namespace App\Console;

use App;
use App\View_weekly_lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call( 
            function () {
                View_weekly_lesson::truncate();

                // inserting regular lessons
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
                        'type' => 0,
                        'canceled' => ($lesson->canceled),
                        'start_time' => ($lesson->start_time),
                        'duration' => ($lesson->duration),
                        'teaching_name' => ($lesson->teaching_name),
                        'classroom_name' => ($lesson->classroom_name)
                        ]);
                }
                
                  // inserting extra lessons
                $lessons = DB::table('extra_lessons')
                ->whereDate('extra_lessons.date_lesson', '>', Carbon::yesterday())
                ->whereDate('extra_lessons.date_lesson', '<', Carbon::today()->addDays(5))
                ->select(
                    'extra_lessons.id as lesson_id',
                    'extra_lessons.teaching_id',
                    'extra_lessons.classroom_id',
                    'extra_lessons.date_lesson',
                    'extra_lessons.start_time',
                    'extra_lessons.duration',
                    'teachings.name as teaching_name',
                    'classrooms.name as classroom_name')
                ->join('classrooms', 'extra_lessons.classroom_id', '=', 'classrooms.id')
                ->join('teachings', 'extra_lessons.teaching_id', '=', 'teachings.id')
                ->get();
                
                foreach ($lessons as $lesson) {
                
                DB::table('view_weekly_lessons')->insertGetId( [
                    'lesson_id' => ($lesson->lesson_id),
                    'teaching_id' => ($lesson->teaching_id),
                    'classroom_id' => ($lesson->classroom_id),
                    'week_day' => (Carbon::parse($lesson->date_lesson)->dayOfWeek),
                    'type' => 1,
                    'canceled' => 0,
                    'start_time' => ($lesson->start_time),
                    'duration' => ($lesson->duration),
                    'teaching_name' => ($lesson->teaching_name),
                    'classroom_name' => ($lesson->classroom_name)
                    ]);
                }
                
                // inserting events
                $lessons = DB::table('special_events')
                ->whereDate('special_events.date_event', '>', Carbon::yesterday())
                ->whereDate('special_events.date_event', '<', Carbon::today()->addDays(5))
                ->select(
                    'special_events.id as lesson_id',
                    'special_events.classroom_id',
                    'special_events.date_event',
                    'special_events.start_time',
                    'special_events.duration',
                    'classrooms.name as classroom_name')
                ->join('classrooms', 'special_events.classroom_id', '=', 'classrooms.id')
                ->get();
                
                foreach ($lessons as $lesson) {
                
                DB::table('view_weekly_lessons')->insertGetId( [
                    'lesson_id' => ($lesson->lesson_id),
                    'teaching_id' => null,
                    'classroom_id' => ($lesson->classroom_id),
                    'week_day' => (Carbon::parse($lesson->date_event)->dayOfWeek),
                    'type' => 2,
                    'canceled' => 0,
                    'start_time' => ($lesson->start_time),
                    'duration' => ($lesson->duration),
                    'teaching_name' => null,
                    'classroom_name' => ($lesson->classroom_name)
                    ]);
                }})->everyMinute(); // per testare lo faccio partire ogni minuto
                //->weekly()->timezone('Europe/Rome');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
