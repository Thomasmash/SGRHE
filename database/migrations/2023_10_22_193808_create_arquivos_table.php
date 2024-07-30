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
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id()->comment('Identificador único do arquivo');
            $table->string('titulo')->comment('Título do arquivo');
            $table->string('categoria')->comment('Categoria do arquivo');
            $table->text('descricao')->comment('Descrição do arquivo');
            $table->string('arquivo')->comment('Nome do arquivo');
            $table->string('caminho')->comment('Caminho do arquivo');
            $table->unsignedBigInteger('idFuncionario')->comment('Identificador do funcionário relacionado');
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('cascade')->comment('Chave estrangeira para a tabela de funcionários');
            $table->timestamps();
        });

        Schema::table('arquivos', function (Blueprint $table) {
            $table->comment = 'Tabela para armazenar meta dados de arquivos';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arquivos');
    }
};