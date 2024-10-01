<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $fake_images = [
            '1.jpg',
            '8.jpg',
            '9.jpg',
            '10.jpg',
            '7.jpg',
            '6.jpg',
            '5.jpg',
            '4.jpg',
            '3.jpg',
            '2.jpg',
            '11.jpg',
        ];

        for ($i = 1; $i <= 40; $i++) { // Generating 30 products
            DB::table('products')->insert([
                'name' => $faker->sentence,
                'slug' => Str::slug($faker->sentence),
                'product_category_id' => $faker->numberBetween(1, 5), // Assuming you have 5 categories
                'description' => $faker->sentence,
                'main_content' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 1000), // Price between 10 and 1000
                'image' => 'uploads/images/' . $fake_images[array_rand($fake_images)],
                'seo_title' => $faker->sentence,
                'seo_description' => $faker->sentence,
                'seo_keywords' => implode(', ', $faker->words(5)),
                'status' => $faker->randomElement(['1']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
