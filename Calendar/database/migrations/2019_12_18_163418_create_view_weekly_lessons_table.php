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
            $table->unsignedBigInteger('teaching_id')->nullable();
            $table->unsignedBigInteger('classroom_id');
            $table->tinyInteger('week_day');
            $table->tinyInteger('type'); // 0 lesson, 1 extra lesson, 2 special event
            $table->boolean('canceled'); // 0 if not canceled, 1 if canceled
            $table->tinyInteger('start_time');
            $table->tinyInteger('duration');
            $table->string('teaching_name', 100)->nullable();
            $table->string('classroom_name', 45);

            $table->timestamps();

            $table->index('teaching_id');
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
