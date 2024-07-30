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
        Schema::create('fotos_unidade_organicas', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela fotos sobre as unidades organicas');

            // Foreign key to arquivos table (file ID)
            $table->unsignedBigInteger('idArguivo')->nullable()->comment('ID do arquivo da foto');

            // Foreign key to unidade_organicas table (unit ID)
            $table->unsignedBigInteger('idUnidadeOrganica')->nullable()->comment('ID da unidade orgânica');
            $table->foreign('idUnidadeOrganica')->references('id')->on('unidade_organicas')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });

        Schema::table('fotos_unidade_organicas', function (Blueprint $table) {
            $table->comment = 'Tabela de fotos das unidades orgânicas';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos_unidade_organicas');
    }
};
