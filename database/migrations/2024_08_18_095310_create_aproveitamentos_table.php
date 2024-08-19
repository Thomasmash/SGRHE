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
        Schema::create('aproveitamentos', function (Blueprint $table) {
            $table->id()->comment('Identificador único do processo');
   
            $table->string('classe')->comment('Classe do aproveitamento');
            $table->string('trimestre')->comment('Trimestre do aproveitamento');
            $table->integer('matriculadosMF')->comment('Matriculados Masculinos  e Femininos no Trimestre');
            $table->integer('matriculadosF')->comment('Matriculados Femininos no Trimestre');
            $table->integer('aprovadosMF')->comment('Aprovados Masculinos e Femininos');
            $table->integer('aprovadosF')->comment('Aprovados e Femininos');
            $table->integer('reprovadosMF')->comment('Reprovados Masculinos e Femininos');
            $table->integer('reprovadosF')->comment('Reprovados e Femininos');
            $table->integer('transferidosEMF')->comment('Transferidos Entrada Masculinos e Femininos');
            $table->integer('transferidosEF')->comment('Transferidos Entrada e Femininos');

            $table->integer('transferidosSMF')->comment('Transferidos Saida Masculinos e Femininos');
            $table->integer('transferidosSF')->comment('Transferidos Saida e Femininos');
            $table->integer('desistentesMF')->comment('Desistentes Masculinos e Femininos');
            $table->integer('desistentesF')->comment('Desistentes e Femininos');
            $table->string('idFuncionario')->comment('identificador do funcionario criador ');
            $table->unsignedBigInteger('idUnidadeOrganica')->nullable()->comment('Identificador da Unidade Organida Relacionado com o Aproveitamento');
            $table->foreign('idUnidadeOrganica')->references('id')->on('unidade_organicas')->onDelete('cascade')->comment('Chave estrangeira para a tabela de unidade organica');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aproveitamentos');
    }
};
