<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoDesempenhoFuncionario;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\Arquivo;

class AvaliacaoDesempenhoFuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function avaliarDesempenhoFuncionario(Request $request)
    {
        //dd($request->request);

        $request->validate([
            // Documento Unico para cada fucnionario uma unica avaliacao por ano
            'periodoAvaliacao' => [
                'required',
                Rule::unique('avaliacao_desempenho_funcionarios')->where(function($query) use ($request){
                    return $query->where('idFuncionario', $request->idFuncionario)
                    ->where('periodoAvaliacao', $request->input('periodoAvaliacao'));
                }),
            ],
        ],[
            //Menssagem personalizada 
            'periodoAvaliacao' => 'O(A) Funcionário(a) '.$request->nomeCompleto.', já foi avaliado(a) no periodo de '.$request->periodoAvaliacao.'! ',
        ]);

        //dd('Passou');
        DB::beginTransaction();
        $avaliacaoFuncionario = AvaliacaoDesempenhoFuncionario::create([
            'nomeCompleto' => $request->input('nomeCompleto'),
            'numeroAgente' => $request->input('numeroAgente'),
            'idCargo' => $request->input('idCargo'),
            'idUnidadeOrganica' => $request->input('idUnidadeOrganica'),
            'idCategoria' => $request->input('idCategoria'),
            //'anoAvaliacao' => $request->input('anoAvaliacao'),
            'um' => $request->input('um'),
            'dois' => $request->input('dois'),
            'tres' => $request->input('tres'),
            'quatro' => $request->input('quatro'),
            'cinco' => $request->input('cinco'),
            'seis' => $request->input('seis'),
            'total' => $request->input('total'),
            'idAvaliador' => session()->only(['funcionario'])['funcionario']->id,
            'idFuncionario' => $request->input('idFuncionario'),
            'Request' => http_build_query($request->all()),
            'classificacao' => $request->input('classificacao'),
            'dataAvaliacao' => date('Y-m-d'),
            'periodoAvaliacao' => $request->input('periodoAvaliacao'),
        ]);

        if ($avaliacaoFuncionario) {
            //Lembrar de Alterar o Estado de avaiacao corrente do Funcionario
            DB::commit();
            return redirect()->back()->with('success', 'A Avaliação do funcionario Foi Submetida com sucesso!');
        }else{
            
            return redirect()->back()->with('error', 'Ouve um erro ao submeter a avaliação do funcionario!');
        }


    }

     
    //Index de avaliacao de Funcionarios Homologados
    public function avaliacaoDesempenhoFuncionariosHomologados()
    {
                //Operacoes de join para varias tabelas relacionadas com funcionarios
                $dados = DB::select('
                select
		        categoria_funcionarios.categoria as categoriaFuncionario, cargos.designacao as designacao_cargo, cargos.id as id_cargo, arquivos.id As id_arquivo, avaliacao_desempenho_funcionarios.id As id_avaliacao_desempenho, funcionarios.id AS id_funcionario , pessoas.id AS id_pessoa, unidade_organicas.id AS id_unidade_organica, categoria_funcionarios.id AS id_categoria_funcionario, avaliacao_desempenho_funcionarios.*, funcionarios.*, pessoas.*, unidade_organicas.*, categoria_funcionarios.*, arquivos.*
                From avaliacao_desempenho_funcionarios
                  JOIN funcionarios ON avaliacao_desempenho_funcionarios.idFuncionario = funcionarios.id
                  JOIN cargos  ON cargos.id = funcionarios.idCargo
                  JOIN pessoas ON pessoas.id = funcionarios.idPessoa
                  JOIN unidade_organicas ON unidade_organicas.id = funcionarios.idUnidadeOrganica
                  JOIN categoria_funcionarios ON categoria_funcionarios.id = funcionarios.idCategoriaFuncionario
                  JOIN arquivos ON arquivos.id = avaliacao_desempenho_funcionarios.idArquivo
                ');  
               // dd($dados);
                return view('sgrhe/pages/tables/avaliaca-desempenho-funcionarios-homologados', compact('dados'));
    }

    
    //Index de avaliacao de Funcionarios nao Homologados 
    public function avaliacaoDesempenhoFuncionariosNaoHomologados()
    {
                //Operacoes de join para varias tabelas relacionadas com funcionarios
                $dados = DB::select('
                Select 
                avaliacao_desempenho_funcionarios.id as id_avaliacao_funcionario, categoria_funcionarios.categoria as categoriaFuncionario, cargos.designacao as designacao_cargo, cargos.id as id_cargo, avaliacao_desempenho_funcionarios.estado AS estado_avaliacao, avaliacao_desempenho_funcionarios.id As id_avaliacao_desempenho, funcionarios.id AS id_funcionario , pessoas.id AS id_pessoa, unidade_organicas.id AS id_unidade_organica, categoria_funcionarios.id AS id_categoria_funcionario, avaliacao_desempenho_funcionarios.*, funcionarios.*, pessoas.*, unidade_organicas.*, categoria_funcionarios.*
                From avaliacao_desempenho_funcionarios
                JOIN funcionarios ON avaliacao_desempenho_funcionarios.idFuncionario = funcionarios.id
                JOIN cargos  ON cargos.id = funcionarios.idCargo
                JOIN pessoas ON pessoas.id = funcionarios.idPessoa
                JOIN unidade_organicas ON unidade_organicas.id = funcionarios.idUnidadeOrganica
                JOIN categoria_funcionarios ON categoria_funcionarios.id = funcionarios.idCategoriaFuncionario
                Where avaliacao_desempenho_funcionarios.estado IS NULL
                ');  
            // dd($dados);
                return view('sgrhe/pages/tables/avaliaca-desempenho-funcionarios-nao-homologados', compact('dados'));
    }

    //Index de avaliacao de um unico funcionario pelo id do funcionario
    public function indexAvaliacaoDesempenhoFuncionario(string $idFuncionario)
    {
                //Operacoes de join para varias tabelas relacionadas com funcionarios
                $dados = DB::select('
                SELECT 
                categoria_funcionarios.categoria as categoriaFuncionario,
                cargos.designacao AS designacao_cargo, 
                cargos.id AS id_cargo, 
                arquivos.id AS id_arquivo, 
                avaliacao_desempenho_funcionarios.id AS id_avaliacao_desempenho, 
                funcionarios.id AS id_funcionario, 
                pessoas.id AS id_pessoa, 
                unidade_organicas.id AS id_unidade_organica, 
                categoria_funcionarios.id AS id_categoria_funcionario, 
                avaliacao_desempenho_funcionarios.*, 
                funcionarios.*, 
                pessoas.*, 
                unidade_organicas.*, 
                categoria_funcionarios.*, 
                arquivos.*
                FROM 
                    avaliacao_desempenho_funcionarios
                JOIN 
                    funcionarios ON avaliacao_desempenho_funcionarios.idFuncionario = funcionarios.id
                JOIN 
                    cargos ON cargos.id = funcionarios.idCargo
                JOIN 
                    pessoas ON pessoas.id = funcionarios.idPessoa
                JOIN 
                    unidade_organicas ON unidade_organicas.id = funcionarios.idUnidadeOrganica
                JOIN 
                    categoria_funcionarios ON categoria_funcionarios.id = funcionarios.idCategoriaFuncionario
                JOIN 
                    arquivos ON arquivos.id = avaliacao_desempenho_funcionarios.idArquivo
                WHERE 
                    funcionarios.id = '.$idFuncionario.'


         ');  
        // dd($dados);
         return view('sgrhe/pages/tables/avaliaca-desempenho-funcionario-homologado', compact('dados'));
    }
//Mostrar avaliacao que ainda nao foi homologado
    public function verAvaliacao(Request $request)
    {
            $D = AvaliacaoDesempenhoFuncionario::find($request->id);
            parse_str($D, $Request);
            $dataAvaliacao = $D['dataAvaliacao'];
           // dd($dataAvaliacao);
            $Documento = PDF::loadView("sgrhe/modelos/Avaliacao-Desempenho", compact('Request','dataAvaliacao'));      
            //Renderizar a View
            $Documento->render();
            //Nomear o Nome do Novo ficheiro PDF
            $fileName = $Request['nomeCompleto'].'-'.$dataAvaliacao.'-AvaliacaoDesempenho.pdf';
            //Retornar o Domunento Gerado 
            // return view("sgrhe/modelos/$categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));
            return response($Documento->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="'.$fileName.'"']);
    }

    public function homologar(Request $request)
    {
        //dd($request->all());
             $processo = AvaliacaoDesempenhoFuncionario::find($request->idAvaliacao);
             $arquivo = $request->file('arquivo');
             $nome = '-Documento';
             $categoria = $request->categoria;
             $idFuncionario = $processo->idFuncionario;
             $nomeArquivo = date('dmYHis').$nome.'.'.$arquivo->extension();
             $caminho = 'funcionarios/'.$idFuncionario.'/'.$categoria.'/'.$nomeArquivo;
            // dd($caminho);
             // Armazenar o arquivo no subdiretório dentro da pasta 'local Especifico'
             //Procurar um outro metodo para o put que guarada com nme personalizado
             Storage::disk('local')->put($caminho, file_get_contents($arquivo));
             if ($request->idArquivo==null) {
                 $arquivo = Arquivo::find($request->idArquivo);
                 DB::beginTransaction();
                 $Arquivo = Arquivo::create([
                     'titulo' =>$nomeArquivo,
                     'categoria' => $categoria,
                     'descricao' => $processo->Request,
                     'arquivo' => $nomeArquivo,
                     'caminho' => $caminho,
                     'idFuncionario' => $idFuncionario,
                 ]);
             if ($Arquivo) {
                 //Alterando o Estado da Origem da avaliacao e o e identificador do ficheiro da Avaliacao do Funcionario
                 $processo->estado = 'Homologado';
                 $processo->idArquivo = $Arquivo->id; //Inserindo o id do Registro arquivo recem criado
                 $processo->save();
                 DB::commit();
                 return redirect()->route('avaliacao.nao.homologados')->with('success', 'O ficheiro foi salvo com sucesso!');
             }else{
                 DB::rollBack();
                 return redirect()->route('avaliacao.nao.homologados')->with('error', 'Erro ao salvar o documento');
             }
         }
         return redirect()->route('avaliacao.nao.homologados')->with('error', 'O documento já existe');
    }
}
