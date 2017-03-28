<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

    for($i = 0; $i < 100; $i++) {
        App\Posts::create([
            'title' => $faker->name,
            'description' => $faker->text($maxNbChars = 1000) ,
            'image' =>  $faker->imageUrl($width = 640, $height = 480),

        ]);
    }
    }
}
