<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $fake_images = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
        ];

        for ($i = 1; $i <= 5; $i++) { // Generating 5 sliders
            DB::table('sliders')->insert([
                'title' => $faker->sentence,
                'image' => 'uploads/images/' . $faker->randomElement($fake_images),
                'upper_subtitle' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
