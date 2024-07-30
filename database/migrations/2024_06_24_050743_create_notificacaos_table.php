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
        Schema::create('notificacaos', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela notificacao');

            // ID do funcionário solicitante
            $table->integer('idFuncionarioSolicitante')->comment('ID do funcionário que solicitou a notificação');

            // Seção relacionada à notificação
            $table->string('seccao')->comment('Seção relacionada à notificação');

            // Visualizado pelo funcionário?
            $table->string('visualizadoFuncionario')->comment('Indica se a notificação foi visualizada pelo funcionário');

            // Visualizado pela seção?
            $table->string('visualizadoSeccao')->comment('Indica se a notificação foi visualizada pela seção');

            // Conteúdo da solicitação
            $table->text('Request')->comment('Conteúdo da solicitação');

            // Foreign key to processos table (process ID)
            $table->unsignedBigInteger('idProcesso')->required()->comment('ID do processo relacionado à notificação');
            $table->foreign('idProcesso')->references('id')->on('processos')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });

        Schema::table('notificacaos', function (Blueprint $table) {
            $table->comment = 'Tabela de notificações';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacaos');
    }
};