<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela documentos');

            // Categoria do documento
            $table->text('categoria')->comment('Categoria do documento');

            // Request do documento
            $table->text('Request')->comment('Request do documento');

            // Funcionário relacionado
            $table->unsignedBigInteger('funcionario')->comment('Funcionário relacionado');

            // Arquivo relacionado
            $table->unsignedBigInteger('idArquivo')->nullable()->comment('ID do arquivo relacionado');

            // Funcionário proprietário
            $table->unsignedBigInteger('idFuncionario')->nullable()->comment('ID do funcionário proprietário');
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });

        Schema::table('documentos', function (Blueprint $table) {
            $table->comment = 'Tabela de metadados dos documentos';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
