<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class FotosUnidadeOrganica extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'fotos_unidade_organicas'; // Nome da tabela

    protected $fillable = [
    'idArguivo',
    'idUnidadeOrganica',
    ];

}
