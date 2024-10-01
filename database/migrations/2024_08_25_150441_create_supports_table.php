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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->string('reason')->nullable();
            $table->string('type')->nullable();
            $table->string('priority')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->string('close_by_id')->nullable();
            $table->text('close_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
