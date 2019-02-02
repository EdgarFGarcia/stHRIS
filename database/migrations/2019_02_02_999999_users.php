<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username');
            $table->string('password');

            // credentials
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');

            $table->date('bday');

            $table->unsignedInteger('hired_id');
            $table->foreign('hired_id')->references('id')->on('hired');

            $table->unsignedInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('gender');

            $table->unsignedInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions');

            $table->unsignedInteger('gov_id');
            $table->foreign('gov_id')->references('id')->on('government');

            $table->tinyInteger('is_regular')->default(0);

            $table->softDeletes();

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
        Schema::dropIfExists('users');
    }
}
