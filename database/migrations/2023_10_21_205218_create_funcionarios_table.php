<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    /**
     * Executa a criação da tabela funcionarios
     */
    public function up(): void 
    {
        Schema::create('funcionarios', function (Blueprint $table) 
        {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('numeroAgente')->comment('Número de agente do funcionário');
            $table->date('dataAdmissao')->comment('Data de admissão do funcionário');
            $table->string('iban')->comment('IBAN do funcionário');
            $table->string('estado')->nullable()->comment('Estado do funcionário');
            $table->string('avaliacaoCorrente')->nullable()->comment('Avaliação corrente do funcionário');
            $table->string('numeroTelefone')->nullable()->comment('Número de telefone do funcionário');
            $table->unsignedBigInteger('idPessoa')->nullable()->comment('ID da pessoa relacionada ao funcionário');
            $table->foreign('idPessoa')->references('id')->on('pessoas')->onDelete('cascade');
            $table->unsignedBigInteger('idUnidadeOrganica')->nullable()->comment('ID da unidade orgânica relacionada ao funcionário');
            $table->foreign('idUnidadeOrganica')->references('id')->on('unidade_organicas');
            $table->unsignedBigInteger('idSeccao')->nullable()->comment('ID da seção relacionada ao funcionário');
            $table->foreign('idSeccao')->references('id')->on('seccaos');
            $table->unsignedBigInteger('idCargo')->nullable()->comment('ID do cargo relacionado ao funcionário');
            $table->foreign('idCargo')->references('id')->on('cargos');
            $table->unsignedBigInteger('idCategoriaFuncionario')->nullable()->comment('ID da categoria de funcionário relacionada ao funcionário');
            $table->foreign('idCategoriaFuncionario')->references('id')->on('categoria_funcionarios');
            $table->timestamps();
        });
        
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->comment = 'Tabela de funcionários';
        });
    }

    /**
     * Executa a remoção da tabela funcionarios
     */
    public function down(): void 
    {
        Schema::dropIfExists('funcionarios');
    }
};