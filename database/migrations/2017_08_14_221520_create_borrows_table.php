<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('borrows', function (Blueprint $table) {
             $table->increments('borrow_id');
             $table->date('borrow_date');
             $table->date('return_date');
             $table->nullableTimestamps();
 
             //foreign keys
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('user_id')->on('users');
 
             $table->integer('item_id')->unsigned();
             $table->foreign('item_id')->references('item_id')->on('items');
 
             $table->string('borrow_type');
             $table->foreign('borrow_type')->references('borrow_type')->on('borrow_types');
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('borrows');
     }
}
