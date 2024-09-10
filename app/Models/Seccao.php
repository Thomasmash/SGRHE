<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Seccao extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'seccaos'; // Nome da tabela
    protected $fillable = [    
        'codNome',
        'designacao',
        'idChefe',
        'email',
		'permissoes',
        //Anexos, Dependencias Tipo Documentos e Outras Imformacoes para se efectivar um determinado processo 
    ];
}
