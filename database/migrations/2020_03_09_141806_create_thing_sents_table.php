<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingSentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thing_sents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('thing_id')->unsigned();
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('thing_id')->references('id')->on('things')->onDelete('cascade');
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
        Schema::dropIfExists('thing_sents');
    }
}
