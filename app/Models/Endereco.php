<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Endereco extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'enderecos'; // Nome da tabela

    protected $fillable = [
        'idPessoa',
        'provincia',
        'municipio',
        'bairro',
        'zona',
        'quarteirao',
        'rua',
        'casa',
    ];
}
