<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $i) {
            $batch = [];

            foreach (range(1, 100) as $j) {
                $batch[] = [
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'created_at' => now()
                ];
            }

            DB::table('users')->insert($batch); // 100 at a time
        }
    }
}
