<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class CartaoMunicipe extends Model implements Auditable
{
    
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'cartao_municipes'; // Nome da tabela

    protected $fillable = [
        'idArquivo',
        'areaResidencia',
        'validadeCM',
        'idEndereco',
    ];
}
