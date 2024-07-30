<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    public function up()
    {

        Schema::create('pessoas', function (Blueprint $table) {

            $table->id();
            $table->string('nomeCompleto')->comment('Nome completo da pessoa');
            $table->date('dataNascimento')->comment('Data de nascimento da pessoa');
            $table->string('genero')->comment('Gênero da pessoa (feminino ou masculino)');
            $table->string('grupoSanguineo')->nullable()->comment('Grupo sanguíneo da pessoa (opcional)');
            $table->string('estadoCivil')->comment('Estado civil da pessoa');
            $table->string('numeroBI', 14)->comment('Número do Bilhete de Identidade (BI) da pessoa');
            $table->date('validadeBI')->comment('Data de validade do BI da pessoa');
            $table->timestamps();

        });
        Schema::table('pessoas', function (Blueprint $table) {

            $table->comment = 'Tabela de pessoas';

        });
        
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }

}