<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();

    for($i = 0; $i < 1000; $i++) {
        App\User::create([
            'name' => $faker->name,
            'email' => $faker->unique()->email,
        'password' => bcrypt('secret'),

        ]);
    }
    }
}
