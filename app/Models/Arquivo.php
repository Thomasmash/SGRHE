<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Arquivo extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'arquivos'; // Nome da tabela

    protected $fillable = [
            'titulo',
            'categoria',
            'descricao',
            'arquivo',
            'caminho',
            'idFuncionario'
    ];
}
