<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kids', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name','35');
          $table->integer('identification');
          $table->integer('age');
          $table->string('relationship');
          $table->string('ethnicity');
          $table->enum('gender', ['Female', 'Male']);
          $table->enum('risk', ['Green', 'Red','Yelow']);
          $table->unsignedInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users')
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
            Schema::dropIfExists('kids');
    }
}
