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
        factory('App\Degree', 60)->create();
        factory('App\Classroom', 100)->create();
        factory('App\Professor', 100)->create();
        factory('App\Teaching', 800)->create();
        factory('App\User', 800)->create();
        factory('App\User', 800)->create();
        factory('App\Update', 800)->create();
        factory('App\Update', 800)->create();
        factory('App\Lesson', 800)->create();
        factory('App\Lesson', 800)->create();
        factory('App\Extra_lesson', 100)->create();
        factory('App\Canceled_lesson', 200)->create();
        factory('App\Special_event', 200)->create();
        factory('App\Professor_teaching', 100)->create();
        factory('App\Degree_teaching', 600)->create();
        factory('App\degree_special_event', 25)->create();
    }
}
