<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela categoria_funcionarios
     */
    public function up(): void
    {
        Schema::create('categoria_funcionarios', function (Blueprint $table) {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('categoria')->comment('Categoria do funcionário (ex: professor, assistente, etc.)');
            $table->string('grau')->comment('Grau do funcionário (ex: licenciatura, mestrado, etc.)');
            $table->decimal('salariobase', 9, 2)->comment('Salário base do funcionário');
            $table->timestamps();
        });

        // Adiciona comentário à tabela
        Schema::table('categoria_funcionarios', function (Blueprint $table) {
            $table->comment = 'Tabela de categorias de funcionários';
        });
    }

    /**
     * Executa a remoção da tabela categoria_funcionarios
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_funcionarios');
    }
};
