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
        Schema::create('social_media_links', function (Blueprint $table) {
            $table->id();
            $table->longText('facebook')->nullable();
            $table->longText('whatsapp')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('tiktok')->nullable();
            $table->longText('telegram')->nullable();
            $table->longText('snapchat')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('pinterest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_links');
    }
};
