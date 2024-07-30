<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela enderecos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('provincia')->nullable()->comment('Província do endereço');
            $table->string('municipio')->nullable()->comment('Município do endereço');
            $table->string('bairro')->nullable()->comment('Bairro do endereço');
            $table->string('zona')->nullable()->comment('Zona do endereço');
            $table->string('quarteirao')->nullable()->comment('Quarteirão do endereço');
            $table->string('rua')->nullable()->comment('Rua do endereço');
            $table->string('casa')->nullable()->comment('Casa do endereço');
            $table->unsignedBigInteger('idPessoa')->required()->comment('Chave estrangeira que referencia a tabela de pessoas');
            $table->foreign('idPessoa')->references('id')->on('pessoas')->onDelete('cascade')->comment('Relação com a tabela de pessoas');
            $table->timestamps();
        });

        // Adiciona comentário à tabela
        Schema::table('enderecos', function (Blueprint $table) {
            $table->comment = 'Tabela de endereços dos usuários';
        });
    }

    /**
     * Executa a remoção da tabela enderecos
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};