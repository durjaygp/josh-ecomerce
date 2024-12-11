<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_section_title')->nullable();
            $table->longText('hero_section_paragraph')->nullable();
            $table->string('hero_section_status')->nullable();
            $table->string('hero_section_image')->nullable();
            // About Section
            $table->string('about_section_title')->nullable();
            $table->text('about_section_header')->nullable();
            $table->longText('about_section_paragraph')->nullable();
            $table->text('about_section_link')->nullable();
            $table->string('about_section_status')->nullable();
            $table->string('about_section_image')->nullable();
            // Service Section
            $table->string('service_section_title')->nullable();
            $table->text('service_section_header')->nullable();
            $table->longText('service_section_paragraph')->nullable();
            $table->text('service_section_link')->nullable();
            $table->string('service_section_status')->nullable();

            // Review Section
            $table->text('review_section_header')->nullable();
            $table->longText('review_section_paragraph')->nullable();
            $table->text('review_section_link')->nullable();
            $table->string('review_section_status')->nullable();

            // Faq Section
            $table->text('faq_section_title')->nullable();
            $table->text('faq_section_header')->nullable();
            $table->longText('faq_section_paragraph')->nullable();
            $table->text('faq_section_link')->nullable();
            $table->string('faq_section_status')->nullable();

            // Blog Section
            $table->text('blog_section_title')->nullable();
            $table->text('blog_section_header')->nullable();
            $table->text('blog_section_link')->nullable();
            $table->string('blog_section_status')->nullable();

            // Blog Section
            $table->text('newsletter_section_title')->nullable();
            $table->text('newsletter_section_header')->nullable();
            $table->text('newsletter_section_link')->nullable();
            $table->string('newsletter_section_status')->nullable();

            // About Section
            $table->text('contact_section_title')->nullable();
            $table->text('contact_section_header')->nullable();
            $table->text('contact_section_link')->nullable();
            $table->string('contact_section_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
