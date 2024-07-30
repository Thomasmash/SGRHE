<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela unidade_organicas
     */
    public function up(): void
    {
        Schema::create('unidade_organicas', function (Blueprint $table) {
            $table->id()->comment('Chave primária auto-incrementável');
            $table->string('designacao')->comment('Designação da unidade orgânica');
            $table->string('descricao')->comment('Descrição da unidade orgânica');
            $table->string('nivelEnsino')->nullable()->comment('Nível de ensino da unidade orgânica');
            $table->string('coordenadasGeograficas')->nullable()->comment('Coordenadas geográficas da unidade orgânica');
            $table->string('eqt')->nullable()->comment('EQT da unidade orgânica');
            $table->string('decretoCriacao')->nullable()->comment('Decreto de criação da unidade orgânica');
            $table->string('localidade')->nullable()->comment('Localidade da unidade orgânica');
            $table->string('telefone')->nullable()->comment('Telefone da unidade orgânica');
            $table->string('email')->nullable()->comment('E-mail da unidade orgânica');
            //$table->integer('numeroAlunos')->nullable()->comment('Número de alunos da unidade orgânica');
            //Ids e todas a Foreign Keys

            //$table->unsignedBigInteger('idDirector')->nullable()->comment('Chave estrangeira que referencia o diretor da unidade orgânica');
            //$table->foreign('idDirector')->references('id')->on('funcionarios')->comment('Relação com a tabela de funcionários');
            //$table->unsignedBigInteger('idSubDirectorPedagogico')->nullable()->comment('Chave estrangeira que referencia o sub-diretor pedagógico da unidade orgânica');
            //$table->foreign('idSubDirectorPedagogico')->references('id')->on('funcionarios')->comment('Relação com a tabela de funcionários');
            //$table->unsignedBigInteger('idSubDirectorAdministractivo')->nullable()->comment('Chave estrangeira que referencia o sub-diretor administrativo da unidade orgânica');
            //$table->foreign('idSubDirectorAdministractivo')->references('id')->on('funcionarios')->comment('Relação com a tabela de funcionários');

            $table->timestamps();
        });

        // Adiciona comentário à tabela
        Schema::table('unidade_organicas', function (Blueprint $table) {
            $table->comment = 'Tabela de unidades orgânicas';
        });
    }

    /**
     * Executa a remoção da tabela unidade_organicas
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_organicas');
    }
};