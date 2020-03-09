<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('obs');
            $table->integer('car_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('car_people');
    }
}
