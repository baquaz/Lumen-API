<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('borrow_types', function (Blueprint $table) {
             $table->string('borrow_type');
             $table->nullableTimestamps();
         });
 
         Schema::table('borrow_types', function(Blueprint $table) {
             $table->primary('borrow_type');
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('borrow_types');
     }
}
