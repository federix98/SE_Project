<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreeTeachingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_teaching', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->unsignedBigInteger('teaching_id')->nullable();
            $table->unsignedBigInteger('teaching_type_id')->nullable();

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
        Schema::dropIfExists('degree_teaching');
    }
}
