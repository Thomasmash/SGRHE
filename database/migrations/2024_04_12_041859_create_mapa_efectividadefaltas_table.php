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
        Schema::create('mapa_efectividadefaltas', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela de meta dados de mapa de efectividades');

            // Foreign key to mapa_efectividades table
            $table->unsignedBigInteger('idMapaEfectividade');
            $table->foreign('idMapaEfectividade')->references('id')->on('mapa_efectividades')->onDelete('cascade');

            // Número do agente
            $table->integer('numeroAgente')->comment('Número do agente');

            // Nome completo do agente
            $table->string('nomeCompleto')->comment('Nome completo do agente');

            // Equipa do agente
            $table->string('eqt')->comment('Equipa do agente');

            // Categoria do agente
            $table->string('categoria')->comment('Categoria do agente');

            // Observações
            $table->string('obs')->nullable()->comment('Observações');

            // Faltas justificadas
            $table->integer('faltasJustificadas')->nullable()->comment('Faltas justificadas');

            // Faltas injustificadas
            $table->integer('faltasInjustificadas')->nullable()->comment('Faltas injustificadas');
            $table->unsignedBigInteger('idFuncionario')->nullable()->comment('Chave estrangeira que referencia ao funcionario criador');
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->comment('Relação com a tabela de funcionários');
          
            // Timestamps
            $table->timestamps();
        });

        Schema::table('mapa_efectividades', function (Blueprint $table) {
            $table->comment = 'Tabela dos meta dados sobre mapa de efectividade';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapa_efectividadefaltas');
    }
};