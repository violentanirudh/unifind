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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['lost', 'found', 'deposited', 'claimed'])->default('lost');
            $table->boolean('is_visible')->default(false);

            $table->time('deposited_at')->nullable();
            $table->time('claimed_at')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreignId('reported_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deposited_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('claimed_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
