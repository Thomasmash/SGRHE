<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class MapaEfectividade extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'mapa_efectividades'; // Nome da tabela

    protected $fillable = [
        'dataPeriodo',
        'estado',
        'idFuncionario',
    ];
}
