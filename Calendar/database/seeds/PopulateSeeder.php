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
        factory('App\ExtraLesson', 100)->create();
        factory('App\CanceledLesson', 200)->create();
        factory('App\SpecialEvent', 200)->create();
        factory('App\ProfessorTeaching', 100)->create();
        factory('App\DegreeTeaching', 600)->create();
        factory('App\DegreeSpecialEvent', 25)->create();
    }
}
