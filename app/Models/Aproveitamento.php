<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Aproveitamento extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
        
    protected $table = 'aproveitamentos'; // Nome da tabela

    protected $fillable = [
        'anoLectivo',
        'classe',                    
        'trimestre',                   
        'matriculadosMF',                    
        'matriculadosF',                                    
        'aprovadosMF',                  
        'aprovadosF',                   
        'reprovadosMF',                  
        'reprovadosF',                    
        'transferidosEMF',                   
        'transferidosEF', 
        'transferidosSMF',                   
        'transferidosSF',                     
        'desistentesMF',                   
        'desistentesF',  
        'idFuncionario',                
        'idUnidadeOrganica',
    ];
}
