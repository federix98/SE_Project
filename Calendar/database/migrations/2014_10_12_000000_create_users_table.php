<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('user_role_id')->nullable();
            $table->string('name', 45);
            $table->string('surname', 45);
            $table->string('matric_no', 7);
            $table->string('email', 254)->unique();
            $table->string('password',32);
            $table->boolean('personal_calendar');
            $table->timestamp('LAU');

            $table->timestamps();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
