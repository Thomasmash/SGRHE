<?php
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;


return new class extends Migration

{

    /**

     * Executa a criação da tabela naturalidades

     *

     * @return void

     */

    public function up()

    {

        Schema::create('naturalidades', function (Blueprint $table) {

            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('provincia')->comment('Província de naturalidade');
            $table->string('municipio')->comment('Município de naturalidade');
            $table->unsignedBigInteger('idPessoa')->nullable()->comment('Chave estrangeira que referencia a tabela de pessoas');
            $table->foreign('idPessoa')->references('id')->on('pessoas')->onDelete('cascade');
            $table->timestamps();

        });

        // Adiciona comentário à tabela
        Schema::table('naturalidades', function (Blueprint $table) {
            $table->comment = 'Tabela de naturalidades dos Funcionarios';
        });

    }


    /**

     * Executa a remoção da tabela naturalidades

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('naturalidades');

    }

};