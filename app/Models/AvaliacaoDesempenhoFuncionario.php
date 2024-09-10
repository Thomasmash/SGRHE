<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class AvaliacaoDesempenhoFuncionario extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'avaliacao_desempenho_funcionarios'; // Nome da tabela

    protected $fillable = [ 
        'um',
        'dois',
        'tres',
        'quatro',
        'cinco',
        'seis',
        'total',
        'idAvaliador',
        'Request',
        'idFuncionario',
        'classificacao',
        'dataAvaliacao',
        'periodoAvaliacao',
        'estado',
        'idArquivo'
    ];



}
