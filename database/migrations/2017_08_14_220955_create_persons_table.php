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
         Schema::create('people', function (Blueprint $table) {
             $table->increments('person_id');
             $table->string('person_name');
             $table->string('email')->nullable();
             $table->string('phone')->nullable();
 
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
         Schema::dropIfExists('people');
     }
}
