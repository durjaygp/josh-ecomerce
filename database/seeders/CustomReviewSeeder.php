<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CustomReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('custom_reviews')->insert([
                'name' => $faker->name,
                'rating' => $faker->numberBetween(1, 5),
                'subject' => $faker->sentence(3),
                'review' => $faker->paragraph,
                'image' => 'https://via.placeholder.com/50x50.jpg',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
