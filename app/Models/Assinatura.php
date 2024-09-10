<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Assinatura extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'assinaturas'; // Nome da tabela

    protected $fillable = [ 
        'assinaturaDigital',
        'assinatura',
        'idFuncionario',
    ];
}
