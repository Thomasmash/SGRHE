<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Auditoria
use OwenIt\Auditing\Contracts\Auditable;

class UnidadeOrganicaDado extends Model implements Auditable
{
    use HasFactory;
        // Autitoria
        use \OwenIt\Auditing\Auditable;
    protected $table = 'unidade_organicas'; // Nome da tabela

    protected $fillable = [
      'anoLectivo',
      'Trimestre',
      'numeroAlunos',
      'numeroAlunosFemenino',
      'alunosAprovados',
      'alunosAprovadosFemenino',
      'alunosReprovados',
      'alunosReprovadosFemenino',
      'alunosTranferidos',
      'alunosTranferidosFemenino',
      'alunosDesistentes',
      'alunosDesistentesFemenino',
       'idUnidadeOrganica',
    ];
  
}
