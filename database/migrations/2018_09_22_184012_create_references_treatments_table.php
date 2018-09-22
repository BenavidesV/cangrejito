<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('references_treatments', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->DateTime('date');
          $table->string('details');
          $table->string('url')->nullable(true);
          $table->string('file')->nullable(true);
          $table->string('path')->nullable(true);
          $table->unsignedInteger('treatment_id');
          $table->foreign('treatment_id')->references('id')->on('treatments')
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
      Schema::dropIfExists('references_treatments');
    }
}
