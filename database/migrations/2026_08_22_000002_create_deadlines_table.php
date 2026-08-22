<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deadlines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('process_id')->constrained('processes')->onDelete('cascade');
            $table->foreignId('responsible_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('due_date');
            $table->dateTime('reminder_at')->nullable();
            $table->string('priority')->default('normal'); // low, normal, high, urgent
            $table->string('status')->default('pending'); // pending, completed, expired
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('due_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deadlines');
    }
};
