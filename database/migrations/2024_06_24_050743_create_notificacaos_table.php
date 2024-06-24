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
        Schema::create('notificacaos', function (Blueprint $table) {
            $table->id();
            $table->integer('idFuncionarioSolicitante');
            $table->string('seccao');
            $table->string('visualizadoFuncionario');
            $table->string('visualizadoSeccao');
            $table->text('Request', 10000);
            $table->unsignedBigInteger('idProcesso')->require();
            $table->foreign('idProcesso')->references('id')->on('processos')->onDelete('cascade');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacaos');
    }
};
