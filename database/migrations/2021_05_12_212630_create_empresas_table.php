<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->string('social_name');
            $table->string('alias_name');
            $table->string('document_company');
            $table->string('document_company_secondary');
            $table->integer('status')->default('0');
            $table->string('logomarca')->nullable();

            /** address */
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('num')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->integer('uf')->nullable();
            $table->integer('cidade')->nullable();
            
            /** contact */
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
