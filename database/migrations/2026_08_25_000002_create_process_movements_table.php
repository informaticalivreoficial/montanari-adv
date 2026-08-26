<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('process_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('process_id')->constrained('processes')->onDelete('cascade');
            $table->dateTime('data_hora')->nullable();
            $table->string('codigo')->nullable();
            $table->string('nome');
            $table->text('complementos')->nullable(); // JSON dos complementos tabelados
            $table->string('orgao_julgador')->nullable();
            $table->timestamps();

            $table->index('process_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('process_movements');
    }
};
