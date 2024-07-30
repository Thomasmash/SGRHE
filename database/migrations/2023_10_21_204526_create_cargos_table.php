<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela cargos
     */
    public function up(): void
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('codNome')->comment('Código e nome do cargo');
            $table->string('designacao')->nullable()->comment('Designação do cargo');
            $table->string('descrisao')->nullable()->comment('Descrição do cargo');
            $table->string('permissoes')->nullable()->comment('Permissões do cargo');
            $table->timestamps();

        });
         // Adiciona comentário à tabela
         Schema::table('cargos', function (Blueprint $table) {
            $table->comment = 'Tabela para armazenar dados dos cargos';
        });
    }

    /**
     * Executa a remoção da tabela cargos
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
