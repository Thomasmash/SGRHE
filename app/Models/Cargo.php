<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Cargo extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
        
    protected $table = 'cargos'; // Nome da tabela

    protected $fillable = [
        'codNome',
        'designacao',
        'descrisao',
        'permissoes',
    ];
}
