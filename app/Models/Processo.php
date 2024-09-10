<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Processo extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'processos'; // Nome da tabela
    protected $fillable = [    
        'idFuncionario',
        'idFuncionarioSolicitante',
        'seccao',
        'categoria',
        'natureza',
        'Request',
        'periodo',
        'estado',
        'deferimento',
        'idArquivo',
        'ratificador',
        
        //Anexos, Dependencias Tipo Documentos e Outras Imformacoes para se efectivar um determinado processo 
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionarioSolicitante');
    }
   
}
