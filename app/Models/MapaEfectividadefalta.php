<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class MapaEfectividadefalta extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'mapa_efectividadefaltas'; // Nome da tabela

    protected $fillable = [
        'idMapaEfectividade',
        'numeroAgente',
        'nomeCompleto',
        'eqt',
        'faltasJustificadas',
        'faltasInjustificadas',
        'categoria',
        'idFuncionario',
    ];
}
