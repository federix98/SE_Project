<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('classroom_id')->nullable();
            $table->bigInteger('teaching_id')->nullable();
            $table->time('start_time', 0);
            $table->tinyInteger('duration');
            $table->date('date_lesson');
            
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
        Schema::dropIfExists('extra_lessons');
    }
}
