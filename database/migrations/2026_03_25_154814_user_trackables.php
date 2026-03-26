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
        Schema::create('user_trackables', function (Blueprint $table) {
            $table->id();                                                               // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');           // Foreign key to users table
            $table->foreignId('trackable_id')->constrained()->onDelete('cascade');      // Foreign key to trackables table

            $table->enum('status', ['not_started', 'in_progress', 'completed', 'on_hold'])->default('not_started'); // Trackable status
            $table->integer('progress_percentage')->default(0);                         // 0 to 100 percentage of trackable completion
            $table->dateTime('completion_date')->nullable();                            // Date & time when the trackable was completed
            $table->text('notes')->nullable();                                          // User notes

            $table->timestamps();                                                       // Default Laravel timestamps

            $table->unique(['user_id', 'trackable_id']);                                // Ensure a user can only track a specific trackable once
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_trackables');
    }
};
