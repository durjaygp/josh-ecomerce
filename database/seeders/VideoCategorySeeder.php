<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Education',
            'Entertainment',
            'Technology',
            'Health & Wellness',
            'Sports',
            'Music',
            'Travel',
            'Food',
            'News',
            'Gaming'
        ];

        foreach ($categories as $category) {
            DB::table('video_categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'status' => 1,
                'description' => "$category related videos.",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
