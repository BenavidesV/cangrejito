<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('medicines', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->DateTime('date');
          $table->string('duration');
          $table->unsignedInteger('kid_id');
          $table->foreign('kid_id')->references('id')->on('kids')
          ->onDelete('cascade');
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
            Schema::dropIfExists('medicines');
    }
}
