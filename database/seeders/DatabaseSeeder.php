<?php

namespace Database\Seeders;

 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
 use Database\Seeders\BlogSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    use HasFactory;
    public function run(): void
    {

        $this->call(AdminSeeder::class);

        \App\Models\Setting::create([
            'id' => 1,
            'name' => 'Website Name',
            'description' => 'user@gmail.com',
            'footer' => 'footer Text',
            'google' => 'footer Text',
            'author' => 'author Name',
            'keywords' => 'author Name',
            'tags' => 'author Name',
            'url' => 'author Name',
            'website_logo' => 'website_logo.jpg',
            'fav_icon' => 'fav_icon.jpg',
        ]);

        \App\Models\About::create([
            'id' => 1,
            'title' => 'About Me',
            'header' => 'lorem Ipsum is simply dummy',
            'description' => 'lorem Ipsum is simply dummy text of the printing and typesetting industrylorem Ipsum is simply dummy text of the printing and typesetting industrylorem Ipsum is simply dummy text of the printing and typesetting industrylorem Ipsum is simply dummy text of the printing and typesetting industrylorem Ipsum is simply dummy text of the printing and typesetting industry ',
            'image' => 'woman.png',
        ]);

        \App\Models\SocialMediaLinks::create([
            'id' => 1,
            'facebook' => 'https://facebook.com',
            'whatsapp' => 'https://whatsapp.com',
            'youtube' => 'https://youtube.com',
            'instagram' => 'https://instagram.com',
            'tiktok' => 'https://tiktok.com',
            'telegram' => 'https://telegram.com',
            'snapchat' => 'https://snapchat.com',
            'twitter' => 'https://twitter.com',
            'pinterest' => 'https://pinterest.com',
        ]);

        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(CustomReviewSeeder::class);


    }
}
