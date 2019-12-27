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
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('teaching_id');
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('professor_id');
            $table->tinyInteger('week_day');
            $table->boolean('canceled');
            $table->tinyInteger('start_time');
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
