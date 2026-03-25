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
        Schema::create('user_quests', function (Blueprint $table) {
            $table->id();                                                       // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   // Foreign key to users table
            $table->foreignId('quest_id')->constrained()->onDelete('cascade');  // Foreign key to quests table

            $table->enum('status', ['not_started', 'in_progress', 'completed', 'on_hold'])->default('not_started'); // Quest status
            $table->integer('progress_percentage')->default(0);                 // 0 to 100 percentage of quest completion
            $table->dateTime('completion_date')->nullable();                    // Date & time when the quest was completed
            $table->text('notes')->nullable();                                  // User notes

            $table->timestamps();                                               // Default Laravel timestamps

            $table->unique(['user_id', 'quest_id']);                            // Ensure a user can only play a specific quest once
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quests');
    }
};
