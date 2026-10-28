<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * O campo 'excerpt' foi criado como VARCHAR(255), porém a validação do
     * formulário permite até 500 caracteres. Ao salvar um resumo com mais de
     * 255 caracteres ocorria "Data too long for column 'excerpt'".
     * Ampliamos para TEXT para acomodar o limite da validação.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('excerpt')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('excerpt', 500)->nullable()->change();
        });
    }
};
