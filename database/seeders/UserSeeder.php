<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $faker = Faker::create();

        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('password'), // You can generate different passwords here
        //     ]);
        // }
        User::create([
            'name' => 'Ei Ei Swe',
            'email' => 'eiswe@gmail.com',
            'password' => Hash::make('eiswe'),
        ]);
        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
        ]);

    }
}
