<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('persons', function (Blueprint $table) {
             $table->increments('person_id');
             $table->string('person_name');
             $table->string('email');
             $table->string('phone');
 
             $table->nullableTimestamps();
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('persons');
     }
}
