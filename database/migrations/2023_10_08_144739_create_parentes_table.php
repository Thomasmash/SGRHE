<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parentes', function (Blueprint $table) {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('nomePai')->comment('Nome do pai');
            $table->string('nomeMae')->comment('Nome da mãe');
            $table->unsignedBigInteger('idPessoa')->nullable()->comment('Chave estrangeira que referencia a tabela de pessoas');
            $table->foreign('idPessoa')->references('id')->on('pessoas')->onDelete('cascade')->comment('Restrição de chave estrangeira que liga a tabela de parentes à tabela de pessoas');
            $table->timestamps();
        });

        Schema::table('parentes', function (Blueprint $table) {
            $table->comment = 'Tabela de parentes Funcionarios';
        });
    }

    public function down()
    {
        Schema::dropIfExists('parentes');
    }
};
