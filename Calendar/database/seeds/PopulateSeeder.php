<?php

use Illuminate\Database\Seeder;

class PopulateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Degree', 400)->create();
        factory('App\Classroom', 1000)->create();
        factory('App\Professor', 1000)->create();
        factory('App\Teaching', 8000)->create();
        factory('App\User', 8000)->create();
        factory('App\User', 8000)->create();
        factory('App\Update', 8000)->create();
        factory('App\Update', 8000)->create();
        factory('App\Lesson', 8000)->create();
        factory('App\Lesson', 8000)->create();
        factory('App\Extra_lesson', 100)->create();
        factory('App\Canceled_lesson', 300)->create();
        factory('App\Special_event', 200)->create();
        factory('App\Professor_teaching', 10000)->create();
        factory('App\Degree_teaching', 6000)->create();
        factory('App\degree_special_event', 250)->create();
    }
}
