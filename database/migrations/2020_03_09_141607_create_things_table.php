<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('from_address_id')->unsigned();
            $table->bigInteger('to_address_id')->unsigned();
            $table->bigInteger('thing_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('from_address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('to_address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('thing_id')->references('id')->on('things')->onDelete('cascade');
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
        Schema::dropIfExists('things');
    }
}
