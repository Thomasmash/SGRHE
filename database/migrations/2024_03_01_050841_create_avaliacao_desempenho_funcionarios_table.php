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
        Schema::create('avaliacao_desempenho_funcionarios', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela avaliacao de funcionarios');

            // Características
            $table->integer('um')->comment('Característica 1'); // Característica 1
            $table->integer('dois')->comment('Característica 2'); // Característica 2
            $table->integer('tres')->comment('Característica 3'); // Característica 3
            $table->integer('quatro')->comment('Característica 4'); // Característica 4
            $table->integer('cinco')->comment('Característica 5'); // Característica 5
            $table->integer('seis')->comment('Característica 6'); // Característica 6
            $table->integer('total')->comment('Total das características'); // Total das características

            // Classificação e Request
            $table->text('classificacao')->comment('Classificação do funcionário'); // Classificação do funcionário
            $table->text('Request')->comment('Request do funcionário'); // Request do funcionário

            // Arquivo e período de avaliação
            $table->string('idArquivo')->nullable()->comment('ID do arquivo de avaliação'); // ID do arquivo de avaliação
            $table->string('periodoAvaliacao')->comment('Período de avaliação'); // Período de avaliação

            // Data de avaliação
            $table->date('dataAvaliacao')->comment('Data de avaliação'); // Data de avaliação

            // Funcionário e avaliador
            $table->unsignedBigInteger('idFuncionario')->comment('ID do funcionário'); // ID do funcionário
            $table->foreign('idFuncionario')->references('id')->on('funcionarios'); // Foreign key to funcionarios table

            $table->unsignedBigInteger('idAvaliador')->comment('ID do avaliador'); // ID do avaliador
            $table->foreign('idAvaliador')->references('id')->on('funcionarios'); // Foreign key to funcionarios table

            // Estado
            $table->string('estado')->nullable()->comment('Estado da avaliação'); // Estado da avaliação

            // Timestamps
            $table->timestamps();
        });

        Schema::table('assinatavaliacao_desempenho_funcionariosuras', function (Blueprint $table) {
            $table->comment = 'Tabela de avaliacao desempenho dos funcionarios';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_desempenho_funcionarios');
    }
};
