<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Cargos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //Cargos 
   
        DB::table('cargos')->insert([
            'codNome' => 'Operario',
            'designacao' =>'Operário Qualificado',
            'permissoes' => '1',
            'descrisao' => 'Read, Solicitar, Emitir Documentos Como:'
        ]);  
        DB::table('cargos')->insert([
            'codNome' => 'Professor',
            'designacao' =>'Professor',
            'permissoes' => '1',
            'descrisao' => 'Read, Solicitar, Emitir Documentos Como:'
        ]);  
        DB::table('cargos')->insert([
            'codNome' => 'TecnicoEscola',
            'designacao' =>'Técnico da Escola',
            'permissoes' => '2',
            'descrisao' => 'Create Read, "Updade Consultar" , Solicitar, Emitir Documentos Como:'
        ]); 
        DB::table('cargos')->insert([
            'codNome' => 'DirectorEscola',
            'designacao' =>'Director da Escola',
            'permissoes' => '3',
            'descrisao' => ' Create Read, Solicitar, Emitir Documentos Como: Dados do Escola...'
        ]);  
        DB::table('cargos')->insert([
            'codNome' => 'ChefeSecretaria',
            'designacao' =>'Chefe de Secretaria',
            'permissoes' => '3',
            'descrisao' => ' Create Read, Solicitar, Emitir Documentos Como: Dados do Escola...'
        ]);  
        DB::table('cargos')->insert([
            'codNome' => 'Secretario',
            'designacao' =>'Secretario',
            'permissoes' => '3',
            'descrisao' => ' Create Read, Solicitar, Emitir Documentos Como: Dados do Escola...'
        ]);  
        DB::table('cargos')->insert([
            'codNome' => 'TecnicoDM',
            'designacao' =>'Técnico da Direcção Municipal ',
            'permissoes' => '4',
            'descrisao' =>'Create, Read, Update, Delete Consultar, Solicitar, Emitir Documentos Como: '
        ]); 
        DB::table('cargos')->insert([
            'codNome' => 'ChefeSeccao',
            'designacao' =>'Chefe de Secção',
            'permissoes' => '5',
            'descrisao' => 'Create, Read, Update, Delete Consultar, Solicitar, Emitir, Aprovar Documentos Como:'
        ]); 
        DB::table('cargos')->insert([
            'codNome' => 'DirectorDM',
            'designacao' =>'Director Municipal',
            'permissoes' => '6',
            'descrisao' => 'Create, Read, Update, Delete Consultar, Solicitar, Emitir, Aprovar Documentos Como: '
        ]); 

    }
}
