<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = Blog::class;

    public function definition()
    {
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

        // Fetch all category IDs from the database
        $categoryIds = \App\Models\Category::pluck('id')->toArray();

        return [
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'image' => 'uploads/images/' . $this->faker->randomElement($fake_images),
            'main_content' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'user_id' => 1,
            'category_id' => $this->faker->randomElement($categoryIds),
            'status' => 1,
            'position' => 1,
            'seo_description' => 'SEO description goes here',
            'seo_tags' => 'SEO tags go here',
            'seo_keywords' => 'SEO keywords go here',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }


}
