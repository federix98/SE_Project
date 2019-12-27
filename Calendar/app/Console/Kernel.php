<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->call(function () {
            //DB::table('recent_users')->delete();
            $lessons = DB::table('lessons')
            ->whereDate('lessons.start_date', '<', Carbon::today())
            ->whereDate('lessons.end_date', '>', Carbon::today())
            ->leftJoin('canceled_lessons', 'lessons.id', 'canceled_lessons.lesson_id')
            ->select('lessons.*','canceled_lessons.id as canceled')
            ->join('teachings', 'lessons.teaching_id', '=', 'teachings.id')
            ->join('classrooms', 'lessons.classroom_id', '=', 'classrooms.id')
            ->join('professor_teaching', 'users.id', '=', 'contacts.user_id')
            ->join('professors', 'users.id', '=', 'orders.user_id')
            ->select('lessons.*','canceled_lessons.id','teachings.id','teachings.name',
            'classrooms.name as className','professors.name as profName')
            ->where(['something' => 'something', 'otherThing' => 'otherThing'])
            ->get();
        })->weekly()->timezone('Europe/Rome');
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
