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
            $table->id()->comment('Identificador único da tabela documentos');
            $table->text('categoria')->comment('Categoria do documento');
            $table->text('Request')->comment('Request do documento');
            $table->unsignedBigInteger('funcionario')->comment('Funcionário relacionado');
            $table->unsignedBigInteger('idArquivo')->nullable()->comment('ID do arquivo relacionado');
            $table->unsignedBigInteger('idFuncionario')->nullable()->comment('ID do funcionário proprietário');
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('funcionario')->references('id')->on('funcionarios');
            $table->foreign('idArquivo')->references('id')->on('arquivos');
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
