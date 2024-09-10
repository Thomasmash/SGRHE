<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class categoriaFuncionario extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'categoria_funcionarios'; // Nome da tabela

    protected $fillable = [
        'categoria',
        'grau',
        'salariobase',
     
    ];
}
