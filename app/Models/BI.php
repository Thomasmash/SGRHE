<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class BI extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'b_i_s'; // Nome da tabela

    protected $fillable = [
       'numeroBI',
       'dataValidade',
       'idArquivo',
       'idFuncionario'
    ];
}
