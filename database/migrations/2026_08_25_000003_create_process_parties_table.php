<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('process_parties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('process_id')->constrained('processes')->onDelete('cascade');
            $table->string('tipo'); // ativo, passivo, outros
            $table->string('nome');
            $table->string('documento')->nullable();
            $table->string('categoria')->nullable();
            $table->timestamps();

            $table->index('process_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('process_parties');
    }
};
