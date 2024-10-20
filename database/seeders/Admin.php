<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //unidade Organica
        DB::table('unidade_organicas')->insert([
            'designacao' => 'Admin',
            'descricao' => 'Admin',
            'eqt' => 'Admin',
            'decretoCriacao' => 'Admin',
            'localidade' => 'Admin',
            'telefone' => '000000001',
            'email' => 'admin@gmail.com',
        ]);
         //pessoas
         DB::table('pessoas')->insert([
            'nomeCompleto' => 'Admin',
            'dataNascimento' => '1999-01-01',
            'genero' => 'N/D',
            'grupoSanguineo' => 'O+',
            'estadoCivil' => 'N/D',
            'numeroBI' => 'N/D',
            'validadeBI' => '1999-01-01',
        ]);
          //naturalidades
          DB::table('naturalidades')->insert([
            'provincia' => 'N/D',
            'municipio' =>  'N/D' ,
            'idPessoa' => '1',
        ]);
         //parentes
         DB::table('parentes')->insert([
            'nomePai' => 'N/D',
            'nomeMae' =>  'N/D' ,
            'idPessoa' => '1',
        ]);
        //enderecos
        DB::table('enderecos')->insert([
                'idPessoa' => '1',
        ]);
		//Categoria Funionarios
        DB::table('categoria_funcionarios')->insert([
            'categoria' => 'Admin',
            'grau' => 'Admin',
            'salariobase' => 145456,
        ]);
		//seccaos
		DB::table('seccaos')->insert([
            'codNome' =>'Admin',
            'designacao' => 'Admin',
            'idChefe' => '',
			'email' => '',
			'permissoes' => 'Admin',
        ]); 
		//cargos
	    DB::table('cargos')->insert([
            'codNome' => 'Admin',
            'designacao' =>'Admin',
            'permissoes' => 'Admin',
            'descrisao' => 'Admin'
        ]); 
         //funcionario
         DB::table('funcionarios')->insert([
            'numeroAgente' => '00000001',
            'dataAdmissao' => '1999-01-01',
            'iban' => '0000 0000 0000 0000 0000 1',
          //  'email' => 'admin@gmail.com',
            'idPessoa' => '1', 
            'idUnidadeOrganica' => '1',
            'idCargo' => '1', 
            'idCategoriaFuncionario' => '1',
            'numeroTelefone' => '000000001',
            'idSeccao' => '1',
        ]);
        
    }
}
