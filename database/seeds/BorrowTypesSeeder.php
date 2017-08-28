<?php

use Illuminate\Database\Seeder;

class BorrowTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert borrow two borrow types: borrow, lend
        DB::table('borrow_types')->insert(['borrow_type' => 'borrow']);
        DB::table('borrow_types')->insert(['borrow_type' => 'lend']);
    }
}
