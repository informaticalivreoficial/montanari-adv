<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Publicações/intimações do DJEN (Diário de Justiça Eletrônico Nacional -
     * sistema "Comunica" do CNJ), vinculadas a um processo. Complementam os
     * dados do Datajud trazendo as comunicações oficiais (citações, intimações).
     */
    public function up(): void
    {
        Schema::create('process_publications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('process_id')
                ->constrained('processes')
                ->onDelete('cascade');

            $table->string('djen_id');                 // hash identificador da comunicação no DJEN
            $table->string('numero_processo')->nullable();
            $table->string('sigla_tribunal')->nullable();
            $table->string('tipo')->nullable();        // Intimação, Citação, etc.

            $table->text('texto')->nullable();         // conteúdo original (HTML hostil)
            $table->text('texto_html')->nullable();    // HTML sanitizado, seguro p/ renderização

            $table->date('data_disponibilizacao')->nullable();
            $table->date('data_publicacao')->nullable();
            $table->string('orgao_julgador')->nullable();
            $table->string('classe')->nullable();
            $table->text('assuntos')->nullable();

            $table->boolean('cancelado')->default(false);
            $table->text('motivo_cancelamento')->nullable();

            $table->string('certidao_url')->nullable();
            $table->json('source_data')->nullable();   // payload original do DJEN

            $table->timestamps();

            $table->unique(['process_id', 'djen_id']);
            $table->index('process_id');
            $table->index('sigla_tribunal');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('process_publications');
    }
};
