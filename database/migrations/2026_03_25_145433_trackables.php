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
        Schema::create('trackables', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained()->onDelete('cascade');   // Foreign key to games table
            $table->foreignId('quest_id')->nullable()->constrained()->onDelete('cascade');   // Foreign key to quests table (use quests.type to determine if it's a main or side quest)

            $table->enum('type', ['achievement', 'collectable', 'secret']); // Trackable type
            $table->string('name');                             // Trackable name
            $table->text('description')->nullable();            // Trackable description
            $table->text('unlockRequirement')->nullable();      // Requirement to unlock the trackable

            $table->timestamps();                               // Default Laravel timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackables');
    }
};
