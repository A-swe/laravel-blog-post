<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $num_posts = 10;
        for ($i = 0; $i < $num_posts; $i++) {
            Post::create([
                'title' => $faker->sentence,
                'message' => $faker->paragraph,
                'type' => $faker->numberBetween(1,2),
                'user_id' => $faker->numberBetween(1,2),
            ]);
        }
       
    }
}
