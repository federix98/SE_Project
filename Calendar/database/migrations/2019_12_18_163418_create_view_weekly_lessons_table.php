<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewWeeklyLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_weekly_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('teaching_id');
            $table->bigInteger('classroom_id');
            $table->bigInteger('professor_id');
            $table->tinyInteger('week_day');
            $table->boolean('canceled');
            $table->time('start_time', 0);
            $table->tinyInteger('duration');
            $table->string('teaching_name', 100);
            $table->string('classroom_name', 45);
            $table->string('professor_name', 45);
            $table->string('professor_surname', 45);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_weekly_lessons');
    }
}
