<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Parente extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'parentes'; // Nome da tabela

    protected $fillable = [
        'nomePai',
        'nomeMae',
        'idPessoa',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}
