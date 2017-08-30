<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Fakerr;
use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('BorrowTypesSeeder');

        $faker = Fakerr::create();
        $fakerPL = new Generator();
        $fakerPL->addProvider(new Faker\Provider\pl_PL\PhoneNumber($fakerPL));
            DB::table('users')->insert([
                'login' => 'tst',
                'password' => app('hash')->make('tst'),
                'api_token' => str_random(60)
            ]);

            DB::table('people')->insert(['person_name' => 'maciek', 'email' => $faker->email]);
            DB::table('people')->insert(['person_name' => 'tomek', 'phone' => $fakerPL->phoneNumber]);
            DB::table('people')->insert(['person_name' => 'bartek', 'email' => $faker->email, 'phone' => $fakerPL->phoneNumber]);
            DB::table('people')->insert(['person_name' => 'andrzej']);
            DB::table('people')->insert(['person_name' => 'filip']);
            
            DB::table('items')->insert(['item_name' => 'item1', 'person_id' => 1]);
            DB::table('items')->insert(['item_name' => 'item2', 'person_id' => 2, 'description' => 'itemek dwa']);
            DB::table('items')->insert(['item_name' => 'item3', 'person_id' => 3, 'category' => 'vinyle']);
            DB::table('items')->insert(['item_name' => 'item4', 'person_id' => 4, 'description' => 'itemek cztery', 'category' => 'oddam jutro']);
            DB::table('items')->insert(['item_name' => 'item5', 'person_id' => 5]);

            DB::table('borrows')->insert([
                'borrow_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                'user_id' => 1,
                'item_id' => 1,
                'borrow_type' => 'borrow'
            ]);

            DB::table('borrows')->insert([
                'borrow_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                'return_date' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now', $timezone = date_default_timezone_get()),
                'user_id' => 1,
                'item_id' => 2,
                'borrow_type' => 'borrow'
            ]);
            DB::table('borrows')->insert([
                'borrow_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                'user_id' => 1,
                'item_id' => 3,
                'borrow_type' => 'lend'
            ]);
            DB::table('borrows')->insert([
                'borrow_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                'user_id' => 1,
                'item_id' => 4,
                'borrow_type' => 'lend'
            ]);
            DB::table('borrows')->insert([
                'borrow_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                'user_id' => 1,
                'item_id' => 5,
                'borrow_type' => 'lend'
            ]);
    }
}
