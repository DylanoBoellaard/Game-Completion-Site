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
        Schema::create('game_category', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); // Foreign key to games table
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_category');
    }
};
