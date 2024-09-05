<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
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

        for ($i = 1; $i <= 5; $i++) { // Generating 5 services
            DB::table('services')->insert([
                'title' => $faker->unique()->sentence,
                'slug' => Str::slug($faker->unique()->sentence),
                'image' => 'uploads/images/' . $faker->randomElement($fake_images),
                'main_content' => $faker->paragraph,
                'description' => $faker->paragraph,
                'user_id' => 1, // Assuming there are 10 users
                'status' => 1,
                'seo_description' => $faker->sentence,
                'seo_tags' => implode(', ', $faker->words(5)),
                'seo_keywords' => implode(', ', $faker->words(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
