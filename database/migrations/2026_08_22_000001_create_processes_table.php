<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('responsible_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('process_number')->unique();
            $table->string('court_name')->nullable();
            $table->string('court_variable')->nullable();
            $table->string('case_type'); // cível, criminal, família, trabalhista, etc
            $table->string('case_area')->nullable(); // áreas específicas
            $table->string('opposing_party')->nullable(); // parte contrária
            $table->string('opposing_lawyer')->nullable(); // advogado da parte contrária
            $table->text('description')->nullable();
            $table->string('status')->default('active'); // active, suspended, archived, closed
            $table->decimal('client_interest', 5, 2)->nullable(); // percentual de sucumbência
            $table->string('contract_value')->nullable();
            $table->text('internal_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('case_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
