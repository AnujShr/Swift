<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        for ($i = 0; $i <= 1;$i++) {
            User::create([
                'name' => $faker->name,
                'email' => ($i == 0) ? 'user@gmail.com' : 'admin@gmail.com',
                'role_id' => $i,
                'password' => Hash::make('password'),
                'confirmed' => 1
            ]);
        }
    }
}
