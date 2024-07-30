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
        Schema::create('processos', function (Blueprint $table) {
            $table->id()->comment('Identificador único do processo');
            $table->integer('idFuncionario')->comment('Identificador do funcionário responsável');
            $table->unsignedBigInteger('idFuncionarioSolicitante')->nullable()->comment('Identificador do funcionário solicitante (opcional)');
            $table->string('seccao')->comment('Seção do processo');
            $table->string('categoria')->comment('Categoria do processo');
            $table->string('natureza')->comment('Natureza do processo');
            $table->text('Request', 10000)->comment('Descrição do processo');
            $table->string('estado')->nullable()->comment('Estado do processo (opcional)');
            $table->string('deferimento')->nullable()->comment('Deferimento do processo (opcional)');
            $table->unsignedBigInteger('idArquivo')->nullable()->comment('Identificador do arquivo relacionado (opcional)');
            $table->unsignedBigInteger('ratificador')->nullable()->comment('Identificador do ratificador do processo (opcional)');
            $table->foreign('idFuncionarioSolicitante')->references('id')->on('funcionarios')->onDelete('cascade')->comment('Chave estrangeira para a tabela de funcionários');
            $table->timestamps();
        });

        Schema::table('processos', function (Blueprint $table) {
            $table->comment = 'Tabela de processos';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
