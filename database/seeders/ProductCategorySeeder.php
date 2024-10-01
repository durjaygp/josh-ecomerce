<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'description' => 'Gadgets, devices, and electronics.',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'description' => 'Clothing, shoes, and accessories.',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home & Furniture',
                'slug' => Str::slug('Home & Furniture'),
                'description' => 'Furniture, kitchen, and decor items.',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beauty & Personal Care',
                'slug' => Str::slug('Beauty & Personal Care'),
                'description' => 'Cosmetics, skincare, and wellness products.',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports & Outdoors',
                'slug' => Str::slug('Sports & Outdoors'),
                'description' => 'Sports equipment and outdoor gear.',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
