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
        Schema::create('files', function (Blueprint $table) {
            $table->id(); // Unique identifier
            $table->string('file_name');
            $table->string('unique_id')->unique(); // Unique file identifier
            $table->string('department'); // Department category
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->string('type'); // Type category
            $table->string('file_path')->nullable(); // Path for uploaded files
            $table->string('tags')->nullable(); // For storing file tags

            $table->enum('status', ['pending', 'in_review', 'approved'])->default('pending'); // Status tracking
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Owner of the file
            $table->timestamps(); // Created at, Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
