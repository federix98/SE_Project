<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('professor_role_id')->nullable();
            $table->bigIncrements('department_id')->nullable();
            $table->string('name', 45);
            $table->string('surname', 45);            
            $table->string('office_address', 100);
            $table->string('email', 254);
            $table->string('telephone_no', 32);
            $table->string('office_hours', 50);

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
        Schema::dropIfExists('professors');
    }
}
