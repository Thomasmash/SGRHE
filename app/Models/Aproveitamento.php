<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aproveitamento extends Model
{
    use HasFactory;
    protected $table = 'aproveitamentos'; // Nome da tabela

    protected $fillable = [
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
