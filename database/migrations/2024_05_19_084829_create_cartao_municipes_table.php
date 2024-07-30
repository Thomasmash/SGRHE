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
        Schema::create('cartao_municipes', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela cartao de municipe');

            // Foreign key to arquivos table (file ID)
            $table->unsignedBigInteger('idArquivo')->nullable()->comment('ID do arquivo do cartão');

            // Área de residência do munícipe
            $table->string('areaResidencia')->required()->comment('Área de residência do munícipe');

            // Data de validade do cartão
            $table->date('validadeCM')->required()->comment('Data de validade do cartão');

            // Foreign key to enderecos table (address ID)
            $table->unsignedBigInteger('idEndereco')->required()->comment('ID do endereço do munícipe');
            $table->foreign('idEndereco')->references('id')->on('enderecos')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });

        Schema::table('cartao_municipes', function (Blueprint $table) {
            $table->comment = 'Tabela de cartões de munícipes';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartao_municipes');
    }
};