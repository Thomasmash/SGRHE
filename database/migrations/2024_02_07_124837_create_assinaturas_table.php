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
        Schema::create('assinaturas', function (Blueprint $table) {
            $table->id()->comment('Identificador único da assinatura');
            $table->string('assinaturaDigital')->comment('Assinatura digital');
            $table->text('assinatura')->nullable()->comment('Assinatura física (opcional)');
            $table->unsignedBigInteger('idFuncionario')->comment('Identificador do funcionário relacionado');
            $table->foreign('idFuncionario')->references('id')->on('funcionarios')->onDelete('cascade')->comment('Chave estrangeira para a tabela de funcionários');
            $table->timestamps();
        });

        Schema::table('assinaturas', function (Blueprint $table) {
            $table->comment = 'Tabela de assinaturas';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assinaturas');
    }
};
