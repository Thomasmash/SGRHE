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
        Schema::create('b_i_s', function (Blueprint $table) {
            $table->id()->comment('Identificador único da tabela');
            $table->string('numeroBI')->comment('Número do BI');
            $table->string('dataValidade')->comment('Data de validade do BI');
            $table->unsignedBigInteger('idFuncionario')->comment('Identificador do funcionário relacionado');
            $table->unsignedBigInteger('idArquivo')->nullable()->comment('Identificador do arquivo relacionado (opcional)');
            $table->foreign('idArquivo')->references('id')->on('arquivos')->onDelete('cascade')->comment('Chave estrangeira para a tabela de arquivos');
            $table->timestamps();
        });

        Schema::table('b_i_s', function (Blueprint $table) {
            $table->comment = 'Tabela de BI';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_i_s');
    }
};