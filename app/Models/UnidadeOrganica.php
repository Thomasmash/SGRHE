<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class UnidadeOrganica extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'unidade_organicas'; // Nome da tabela

    protected $fillable = [
        'designacao',
        'descricao',
        'eqt',
        'decretoCriacao',
        'localidade',
        'telefone',
        'email',
        'nivelEnsino',
        'coordenadasGeograficas',
    ];
        // Relacionamento com a tabela Parentes
        public function funcionarios()
        {
            return $this->belongsTo(Funcionario::class);
        }
   
}
