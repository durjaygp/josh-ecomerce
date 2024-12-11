<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homepage_settings')->insert([
            // Hero Section
            'hero_section_title' => 'Welcome to Our Website',
            'hero_section_paragraph' => 'We provide the best services to make your life better.',
            'hero_section_status' => 1,
            'hero_section_image' => 'hero_image.jpg',
            'hero_section_button_link' => 'https://example.com/',
            'hero_section_button_text' => 'Explore More',

            // About Section
            'about_section_title' => 'About Us',
            'about_section_header' => 'Who We Are',
            'about_section_paragraph' => 'We are a leading company in the industry, delivering quality services.',
            'about_section_link' => 'https://example.com/about',
            'about_section_status' => 1,
            'about_section_image' => 'about_image.jpg',

            // Service Section
            'service_section_title' => 'Our Services',
            'service_section_header' => 'What We Offer',
            'service_section_paragraph' => 'Discover a variety of services tailored to your needs.',
            'service_section_link' => 'https://example.com/services',
            'service_section_status' => 1,

            // Review Section
            'review_section_header' => 'What Our Clients Say',
            'review_section_paragraph' => 'Read reviews from our satisfied clients.',
            'review_section_link' => 'https://example.com/reviews',
            'review_section_status' => 1,

            // Faq Section
            'faq_section_title' => 'Frequently Asked Questions',
            'faq_section_header' => 'Your Questions Answered',
            'faq_section_paragraph' => 'Find answers to the most common questions.',
            'faq_section_link' => 'https://example.com/faq',
            'faq_section_status' => 1,

            // Blog Section
            'blog_section_title' => 'Latest Blog Posts',
            'blog_section_header' => 'Stay Updated',
            'blog_section_link' => 'https://example.com/blog',
            'blog_section_status' => 1,

            // Newsletter Section
            'newsletter_section_title' => 'Join Our Newsletter',
            'newsletter_section_header' => 'Stay Connected',
            'newsletter_section_link' => 'https://example.com/newsletter',
            'newsletter_section_status' => 1,

            // Contact Section
            'contact_section_title' => 'Get in Touch',
            'contact_section_header' => 'We’d Love to Hear From You',
            'contact_section_link' => 'https://example.com/contact',
            'contact_section_status' => 1,

            // Timestamps
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
