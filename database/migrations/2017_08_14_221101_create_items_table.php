<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('items', function (Blueprint $table) {
             $table->increments('item_id');
             $table->string('item_name');
             $table->string('description');
             $table->string('category');
 
             $table->nullableTimestamps();
 
             // //foreign keys
             $table->integer('person_id')->unsigned();
             $table->foreign('person_id')->references('person_id')->on('people');
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('items');
     }
}
