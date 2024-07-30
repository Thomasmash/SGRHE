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
        Schema::create('mapa_efectividades', function (Blueprint $table) {
            // Primary key
            $table->id()->comment('Identificador único da tabela mapa de efectividades');

            // Data do período de avaliação
            $table->date('dataPeriodo')->comment('Data do período de avaliação');

            // Estado do mapa de efectividade
            $table->string('estado')->comment('Estado do mapa de efectividade');

            // Timestamps
            $table->timestamps();
        });

        Schema::table('mapa_efectividades', function (Blueprint $table) {
            $table->comment = 'Tabela de mapas de efectividade';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapa_efectividades');
    }
};
