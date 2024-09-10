<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Documento extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'documentos'; // Nome da tabela

    protected $fillable = [
        'Request',
        'funcionario',
        'idFuncionario',
        'idArquivo',
        'categoria',
    ];
}
