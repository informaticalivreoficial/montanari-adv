<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adiciona a coluna "documento_tipo" (Despacho, Sentença, Acórdão, etc.)
     * às publicações do DJEN, distinta do "tipo" (Intimação, Citação...).
     */
    public function up(): void
    {
        Schema::table('process_publications', function (Blueprint $table) {
            $table->string('documento_tipo')->nullable()->after('tipo');
        });
    }

    public function down(): void
    {
        Schema::table('process_publications', function (Blueprint $table) {
            $table->dropColumn('documento_tipo');
        });
    }
};
