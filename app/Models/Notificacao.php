<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;
    protected $table = 'notificacaos'; // Nome da tabela

    protected $fillable = [
       'idFuncionarioSolicitante',
       'Request',
       'idProcesso',
       'visualizado',
    ];

    // Relacionamento com a tabela Naturalidade
    public function naturalidade()
    {
        return $this->belongsTo(Processos::class, 'idProcesso');
    }


}
