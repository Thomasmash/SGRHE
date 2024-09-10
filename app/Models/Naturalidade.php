<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class Naturalidade extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'naturalidades'; // Nome da tabela

    protected $fillable = [
        'provincia',
        'municipio',
        'idPessoa',
    ];
    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}
