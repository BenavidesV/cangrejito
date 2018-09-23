<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('treatments', function (Blueprint $table) {
          $table->increments('id');
          $table->string('treatments_physical');
          $table->string('medicines');
          $table->string('illness');
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
        Schema::dropIfExists('treatments');
    }
}
