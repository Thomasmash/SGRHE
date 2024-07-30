<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela seccaos
     */
    public function up(): void
    {
        Schema::create('seccaos', function (Blueprint $table) {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('codNome')->comment('Código e nome da seção');
            $table->string('designacao')->comment('Designação da seção');
            $table->string('idChefe')->nullable()->comment('ID do chefe da seção');
            $table->string('permissoes')->nullable()->comment('Permissões da seção');
            $table->string('email')->nullable()->comment('E-mail da seção');
            $table->timestamps();
        });

        // Adiciona comentário à tabela
        Schema::table('seccaos', function (Blueprint $table) {
            $table->comment = 'Tabela de seções';
        });
    }

    /**
     * Executa a remoção da tabela seccaos
     */
    public function down(): void
    {
        Schema::dropIfExists('seccaos');
    }
};