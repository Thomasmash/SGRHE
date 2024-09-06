<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('audit.drivers.database.connection', config('database.default'));
        $table = config('audit.drivers.database.table', 'audits');

        Schema::connection($connection)->create($table, function (Blueprint $table) {

            $morphPrefix = config('audit.user.morph_prefix', 'user');

            $table->bigIncrements('id');
          //  $table->unsignedInteger('user_id');
            $table->string($morphPrefix . '_type')->nullable();
            $table->unsignedBigInteger($morphPrefix . '_id')->nullable();
            $table->string('event')->comment('Tipo de Evento');
            $table->morphs('auditable');
            $table->text('old_values')->nullable()->comment('Valor Antigo');
            $table->text('new_values')->nullable()->comment('Novo Valor');
            $table->text('url')->nullable()->comment('URL');
            $table->ipAddress('ip_address')->nullable()->comment('Endereço ip do computador');
            $table->string('user_agent', 1023)->nullable()->comment('User Agente ou caracteristicas do browser ou sistema logado');
            $table->string('tags')->nullable()->comment('Tags');
            $table->timestamps();

            $table->index([$morphPrefix . '_id', $morphPrefix . '_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('audit.drivers.database.connection', config('database.default'));
        $table = config('audit.drivers.database.table', 'audits');

        Schema::connection($connection)->drop($table);
    }
}
