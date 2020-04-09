<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetTraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_traits', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('traits_id')->unsigned();
            $table->foreign('traits_id')->references('id')->on('traits');

            $table->integer('pet_id')->unsigned();
            $table->foreign('pet_id')->references('id')->on('pets');

            $table->string('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_traits');
    }
}
