<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Funcionario extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'funcionarios'; // Nome da tabela

    protected $fillable = [
        'numeroAgente',
        'dataAdmissao',
        'idSeccao',
        'iban',
        //'email',
        'idPessoa', 
        'idUnidadeOrganica',
        'idCargo', 
        'idCategoriaFuncionario',
        'numeroTelefone',
        'avaliacaoCorrente',
        'estado'
    ];
}
