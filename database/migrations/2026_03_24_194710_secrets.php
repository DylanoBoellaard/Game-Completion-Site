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
        Schema::create('secrets', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); // Foreign key to games table (shared primary key)
            $table->foreignId('main_quest_id')->constrained('mainQuests')->onDelete('cascade')->nullable(); // Foreign key to mainQuests table (shared primary key)
            $table->foreignId('side_quest_id')->constrained('sideQuests')->onDelete('cascade')->nullable(); // Foreign key to sideQuests table (shared primary key)
            $table->string('name');                             // Secret name
            $table->text('description')->nullable();            // Secret description
            $table->text('unlockRequirement')->nullable();      // Requirement to unlock the secret
            $table->boolean('is_completed')->default(false);    // Whether the secret is completed or not
            $table->dateTime('completion_date')->nullable();    // Date & time when the secret was completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secrets');
    }
};
