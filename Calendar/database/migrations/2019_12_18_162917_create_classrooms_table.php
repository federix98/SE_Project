<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('building_id')->nullable();
            $table->string('name', 45);
            $table->string('address', 100);
            $table->tinyInteger('floor');
            $table->text('directions');
            $table->integer('capacity');
            $table->boolean('accessibility');

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
        Schema::dropIfExists('classrooms');
    }
}
