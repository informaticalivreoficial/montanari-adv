<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
        DB::statement('ALTER TABLE posts MODIFY excerpt TEXT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE posts MODIFY excerpt VARCHAR(500) NULL');
    }
};
