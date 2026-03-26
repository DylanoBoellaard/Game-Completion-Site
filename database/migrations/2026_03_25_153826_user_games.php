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
        Schema::create('user_games', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable(); // Link to user (nullable for future multi-user support)
            $table->foreignId('game_id')->constrained()->onDelete('cascade');             // Link to games table

            $table->enum('status', ['not_started', 'in_progress', 'completed', 'on_hold'])->default('not_started'); // Game status
            $table->dateTime('completion_date')->nullable();                              // Date & time when the game was completed
            $table->integer('playtime')->default(0);                                      // Total playtime in minutes
            $table->text('notes')->nullable();                                  // User notes

            $table->timestamps();                                                         // Default Laravel timestamps

            $table->unique(['user_id', 'game_id']);                                       // Ensure a user can only play a specific game once
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_games');
    }
};
