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
        Schema::create('mainQuests', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); // Foreign key to games table (shared primary key)
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable(); // Link to user (nullable for future multi-user support)
            $table->string('name');                             // Main quest name
            $table->text('description')->nullable();            // Main quest description
            $table->enum('status', ['not_started', 'in_progress', 'completed', 'on_hold'])->default('not_started'); // Main quest status
            //$table->boolean('is_completed')->default(false);  // Whether the game is completed or not (OLD --- IGNORE --- USE STATUS)
            $table->integer('progress_percentage')->default(0); // 0 to 100 percentage of main quest completion
            $table->dateTime('completion_date')->nullable();    // Date & time when the main quest was completed
            $table->text('notes')->nullable();                  // User notes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mainQuests');
    }
};
