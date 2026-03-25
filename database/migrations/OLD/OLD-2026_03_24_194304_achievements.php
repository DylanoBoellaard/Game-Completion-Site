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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); // Foreign key to games table (shared primary key)
            $table->foreignId('main_quest_id')->constrained('mainQuests')->onDelete('cascade')->nullable(); // Foreign key to mainQuests table (only one of main_quest_id or side_quest_id will be set, depending on the type of achievement if any)
            $table->foreignId('side_quest_id')->constrained('sideQuests')->onDelete('cascade')->nullable(); // Foreign key to sideQuests table
            $table->string('name');                             // Achievement name
            $table->text('description')->nullable();            // Achievement description
            $table->text('unlockRequirement')->nullable();      // Requirement to unlock the achievement
            $table->enum('status', ['not_started', 'in_progress', 'completed', 'on_hold'])->default('not_started'); // Achievement status
            //$table->boolean('is_completed')->default(false);  // Whether the game is completed or not (OLD --- IGNORE --- USE STATUS)
            $table->integer('progress_percentage')->default(0); // 0 to 100 percentage of achievement completion
            $table->dateTime('completion_date')->nullable();    // Date & time when the achievement was completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
