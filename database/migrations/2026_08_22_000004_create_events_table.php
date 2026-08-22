<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('process_id')->nullable()->constrained('processes')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->boolean('all_day')->default(false);
            $table->string('event_type')->default('other'); // hearing, meeting, deadline, task, other
            $table->string('color')->nullable();
            $table->text('location')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('start_date');
            $table->index('event_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
