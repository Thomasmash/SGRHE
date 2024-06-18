<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;
use App\Models\Pessoa;
use App\Models\Naturalidade;
use App\Models\Parente;
use App\Models\Cargo;
use App\Models\CategoriaFuncionario;
use App\Models\Processo;
use App\Models\Seccao;
use App\Models\UnidadeOrganica;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class FuncionarioController extends Controller
{
 
    //Mostrar Funcionarios Via Formulários
    public function  indexFuncionarios(Request $request)
    {
       
        $estado = "";
        $unidadeOrganica = "";
        $idUnidadeOrganica = "";
        if ($request->estado === "Todo") {
            if(isset($request->idUnidadeOrganica) || $request->idUnidadeOrganica != "" ){
                $idUnidadeOrganica = $request->idUnidadeOrganica;
                $unidadeOrganica="where unidade_organicas.id=".$request->idUnidadeOrganica;
                $estado="";  
            }else {
                $estado="";
            }
        }else{
            if(isset($request->idUnidadeOrganica) || $request->idUnidadeOrganica != "" ){
                $estado ="where funcionarios.estado=".'"'.$request->estado.'"';  
                $idUnidadeOrganica = $request->idUnidadeOrganica;
                $unidadeOrganica="And unidade_organicas.id=".$request->idUnidadeOrganica;
            }else {
                $estado ="where funcionarios.estado=".'"'.$request->estado.'"';  
            }  
        }
          //Operacoes de join para varias tabelas relacionadas com funcionarios
          $dados = DB::select('
          select 
           seccaos.designacao as designacao_seccao, unidade_organicas.designacao as designacao_unidadeOrganica, funcionarios.id as id_funcionario, pessoas.id as id_pessoas, unidade_organicas.id as id_unidade_organica, categoria_funcionarios.categoria as categoria_unidade_organica, cargos.designacao as nomeCargo, 
           funcionarios.*, pessoas.*, categoria_funcionarios.*, unidade_organicas.*, cargos.*, seccaos.*
              from funcionarios
              join pessoas on pessoas.id=funcionarios.idPessoa
              join categoria_funcionarios on categoria_funcionarios.id=funcionarios.idCategoriaFuncionario
              join seccaos on seccaos.id=funcionarios.idSeccao
              join unidade_organicas on unidade_organicas.id=funcionarios.idUnidadeOrganica
              join cargos on cargos.id=funcionarios.idCargo            
          '.$estado.$unidadeOrganica);
         if ($unidadeOrganica ==="") {
            $titulo = $request->titulo;
         }else {
            $unidadeOrganica = UnidadeOrganica::find($idUnidadeOrganica);
            $titulo = "FUNCIONÁRIOS DA ".$unidadeOrganica->designacao;
         }
          $estado = $request->estado; 
          return view('sgrhe/pages/tables/funcionarios',compact('dados','titulo','estado','unidadeOrganica','idUnidadeOrganica'));
    }
    
    //Verificar Se criar ou Editar par Exibir funcionario
        public function formulario($id = null){
        //Se o $id for nulo é a criacao de um novo registro se nao é edicao
        $pessoa = $id ? Pessoa::where('id',$id)->first():null;
        $funcionario = $id ? Funcionario::where('idPessoa',$id)->first():null;
        $naturalidade = $id ? Naturalidade::where('idPessoa',$id)->first():null;
        $parente = $id ? Parente::where('idPessoa',$id)->first():null;
        //Pesquisa Pelo Id do Funcionario
        $opcoesCargo =  $id ? Cargo::where('id',$funcionario->idCargo)->first():null;
        $opcoesSeccaos =  $id ? Seccao::where('id',$funcionario->idSeccao)->first():null;
        //dd($opcoesSeccaos);
        //dd($opcoesCargo);
        $opcoesUnidadeOrganica = $id ?  UnidadeOrganica::where('id',$funcionario->idUnidadeOrganica)->first():null;
        $opcoesCategoriaFuncionario = $id ?  CategoriaFuncionario::where('id',$funcionario->idCategoriaFuncionario)->first():null;
        return view('sgrhe/pages/forms/funcionario',compact('pessoa','funcionario','naturalidade','parente','opcoesCargo','opcoesUnidadeOrganica','opcoesCategoriaFuncionario','opcoesSeccaos'));
     }

        //Verificar a Existencia  Pessoa Pré cadastrada
     public function verificarPessoa(Request $request){
        $validar = $request->validate([
            'numeroBI' => ['required'],
        ]);
        // Verifique se o Numero de Bilhete de Identidade existe na tabela pessoa
        $pessoa = Pessoa::where('numeroBI', $request->numeroBI)->first();
        if ($pessoa) {
            return view('sgrhe/pages/forms/funcionario', compact('pessoa'));//->with('feito', 'Pessoa encontrada com sucesso!');
           }else{
            return redirect()->back()->with('aviso','Não foi possível encontrar a pessoa!');
           } 
        }

        public function verificarPessoaFuncionario(Request $request, $numeroBI){
          // dd($numeroBI);
            // Verifique se o Numero de Bilhete de Identidade existe na tabela pessoa
            $pessoa = Pessoa::where('numeroBI', $numeroBI)->first();
            if ($pessoa) {
                return view('sgrhe/pages/forms/funcionario', compact('pessoa'));//->with('feito', 'Pessoa encontrada com sucesso!');
               }else{
                return redirect()->back()->with('aviso','Não foi possível encontrar a pessoa!');
               } 
            }


     //Read
    public function index()
    {
          //Operacoes de join para varias tabelas relacionadas com funcionarios
          $dados = DB::select('
          select 
           seccaos.designacao as designacao_seccao, unidade_organicas.designacao as designacao_unidadeOrganica, funcionarios.id as id_funcionario, pessoas.id as id_pessoas, unidade_organicas.id as id_unidade_organica, categoria_funcionarios.categoria as categoria_unidade_organica, cargos.designacao as nomeCargo, 
           funcionarios.*, pessoas.*, categoria_funcionarios.*, unidade_organicas.*, cargos.*, seccaos.*
              from funcionarios
              join pessoas on pessoas.id=funcionarios.idPessoa
              join categoria_funcionarios on categoria_funcionarios.id=funcionarios.idCategoriaFuncionario
              join seccaos on seccaos.id=funcionarios.idSeccao
              join unidade_organicas on unidade_organicas.id=funcionarios.idUnidadeOrganica
              join cargos on cargos.id=funcionarios.idCargo 
          ');
          $titulo = "Funcionários / Força de Trabalho";
          return view('sgrhe/pages/tables/funcionarios',compact('dados','titulo'));
    }
   /*
    public function indexFuncionariosInativos()
    {
          //Operacoes de join para varias tabelas relacionadas com funcionarios
          $dados = DB::select('
          select 
           seccaos.designacao as designacao_seccao, unidade_organicas.designacao as designacao_unidadeOrganica, funcionarios.id as id_funcionario, pessoas.id as id_pessoas, unidade_organicas.id as id_unidade_organica, categoria_funcionarios.categoria as categoria_unidade_organica, cargos.designacao as nomeCargo, 
           funcionarios.*, pessoas.*, categoria_funcionarios.*, unidade_organicas.*, cargos.*, seccaos.*
              from funcionarios
              join pessoas on pessoas.id=funcionarios.idPessoa
              join categoria_funcionarios on categoria_funcionarios.id=funcionarios.idCategoriaFuncionario
              join seccaos on seccaos.id=funcionarios.idSeccao
              join unidade_organicas on unidade_organicas.id=funcionarios.idUnidadeOrganica
              join cargos on cargos.id=funcionarios.idCargo 
            where funcionarios.estado = "Inactiv"
          ');
          $titulo = "Funcionários em estado";
          return view('sgrhe/pages/tables/funcionarios',compact('dados','titulo'));
    }
*/
  
//Create
    public function store(Request $request) {
       // dd($request->all());
       $cargo = Cargo::find($request->idCargo);
       $seccao = Seccao ::find($request->idSeccao);
       if ($cargo->codNome === "DirectorEscola") {
        $funcionario = Funcionario::where('idUnidadeOrganica', $request->idUnidadeOrganica)->where('idCargo', 5)->exists();
        if ($funcionario) {
            return redirect()->back()->with('error', 'O Cargo à Director para essa Escola não se encontra Disponível ');
        }else{
            $request->validate([
                'idCargo' => [
                    Rule::unique('funcionarios')->where( function($query) {
                        $query->where('idCargo', 8);
                    })->ignore($request->idCargo),
                ],
            'numeroAgente' => ['numeric','required','unique:funcionarios,numeroAgente'],
            //'numeroBI' => ['required','unique:funcionarios,numeroBI'],
            'dataAdmissao' => ['date','required','before_or_equal:now'],
            'iban' => ['string','required','unique:funcionarios,iban'],
            //'email' => ['email','max:255','nullable','unique:funcionarios,email'],
            'numeroTelefone' => ['between:9,14','unique:funcionarios,numeroTelefone'],    
            //'idPessoa'=> ['numeric','required','unique:funcionarios,idPessoa,except'.''],
            //'idUnidadeOrganica'=> ['numeric'],
            //'idCargo'=>['numeric'],
            // 'idCategoriaFuncionario' => ['required'],
            ],[
                'idCargo.unique' => 'O Cargo de Director Muninipal não está Disponível!',
                'numeroAgente.unique' => 'O Número de agente já está sendo utilizado por outro Funcionário!',
                //'numeroBI.unique' => 'O Número de Bilhete de Identidade já está sendo utilizado por outro Funcionário!',
                'numeroAgente.required' => 'O Número de Agente é Obrigatório!',
                'numeroAgente.numeric' => 'O Número de Agente deve ser um numero!',
                'dataAdmissao.before' => 'A data de Admissão deve ser antes do dia de Hoje!', 
                'dataAdmissao.required' => 'A data de Admissão é Obrigatória!',
                'iban.unique' => 'O Iban ja está sendo utilizado por outro Funcionário!',
                //'email.unique' => 'O Email ja está sendo utilizado por outro Funcionário!', 
                'numeroTelefone.unique' => 'O Numero de Telefone já está sendo utilizado por outro Funcionário!',
            ]);
            DB::beginTransaction();
            $funcionario = Funcionario::create([
                'numeroAgente' => $request->input('numeroAgente'),
                'dataAdmissao' => $request->input('dataAdmissao'),
                'iban' => $request->input('iban'),
                //'email' => $request->input('email'),
                'idPessoa' => $request->input('idPessoa'),
                'idUnidadeOrganica' => $request->input('idUnidadeOrganica'),
                'idCargo' => $request->input('idCargo'), 
                'idCategoriaFuncionario' => $request->input('idCategoriaFuncionario'),
                'numeroTelefone'=> $request->input('numeroTelefone'),
                'idSeccao'=> $request->input('idSeccao'),
                'estado'=> "Activo",

             ]);
            if ($funcionario) {
                DB::commit();
                return redirect()->back()->with('success', 'Funcionário Cadastrado com sucesso!');
            }else{
                DB::rollBack();
                return redirect()->back()->with('aviso', 'Erro de Cadastrado Funcionário!')->withErrors($request);
            }
        }
    }else{
        $request->validate([
            'idCargo' => [
                Rule::unique('funcionarios')->where( function($query) {
                    $query->where('idCargo', 8);
                })->ignore($request->idCargo),
            ],
        'numeroAgente' => ['numeric','required','unique:funcionarios,numeroAgente'],
        //'numeroBI' => ['required','unique:funcionarios,numeroBI'],
        'dataAdmissao' => ['date','required','before_or_equal:now'],
        'iban' => ['string','required','unique:funcionarios,iban'],
        //'email' => ['email','max:255','nullable','unique:funcionarios,email'],
        'numeroTelefone' => ['between:9,14','unique:funcionarios,numeroTelefone'],    
        //'idPessoa'=> ['numeric','required','unique:funcionarios,idPessoa,except'.''],
        //'idUnidadeOrganica'=> ['numeric'],
        //'idCargo'=>['numeric'],
        // 'idCategoriaFuncionario' => ['required'],
        ],[
            'idCargo.unique' => 'O Cargo de Director Muninipal não está Disponível!',
            'numeroAgente.unique' => 'O Número de agente já está sendo utilizado por outro Funcionário!',
            //'numeroBI.unique' => 'O Número de Bilhete de Identidade já está sendo utilizado por outro Funcionário!',
            'numeroAgente.required' => 'O Número de Agente é Obrigatório!',
            'numeroAgente.numeric' => 'O Número de Agente deve ser um numero!',
            'dataAdmissao.before' => 'A data de Admissão deve ser antes do dia de Hoje!', 
            'dataAdmissao.required' => 'A data de Admissão é Obrigatória!',
            'iban.unique' => 'O Iban ja está sendo utilizado por outro Funcionário!',
            //'email.unique' => 'O Email ja está sendo utilizado por outro Funcionário!', 
            'numeroTelefone.unique' => 'O Numero de Telefone já está sendo utilizado por outro Funcionário!',
        ]);
        DB::beginTransaction();
        $funcionario = Funcionario::create([
            'numeroAgente' => $request->input('numeroAgente'),
            'dataAdmissao' => $request->input('dataAdmissao'),
            'iban' => $request->input('iban'),
            //'email' => $request->input('email'),
            'idPessoa' => $request->input('idPessoa'),
            'idUnidadeOrganica' => $request->input('idUnidadeOrganica'),
            'idCargo' => $request->input('idCargo'), 
            'idCategoriaFuncionario' => $request->input('idCategoriaFuncionario'),
            'numeroTelefone'=> $request->input('numeroTelefone'),
            'idSeccao'=> $request->input('idSeccao'),
            'estado'=> "Activo",

         ]);
              //Verificar  Eleicao para o Cargo de Chefe de Seccao
              if ($cargo->codNome === "ChefeSeccao") {
                // dd('E para cargos de chefia');
                 //Verificar se em todos os funcionarios já existir alguem da mesma seccao com o cargo de chefe de secção
                 $verificarChefeSeccao = Funcionario::where('idcargo', $cargo->id)->where('idSeccao', $seccao->id);
                 if ($verificarChefeSeccao) {
                      //Verificar  Eleicao para o Cargo de Chefe de Seccao
                      if ($cargo->codNome === "ChefeSeccao") {
                         //Verificar se em todos os funcionarios já existir alguem da mesma seccao com o cargo de chefe de secção
                         $verificarChefeSeccao = Funcionario::where('idcargo', $cargo->id)->where('idSeccao', $seccao->id)->exists();
                         if ($verificarChefeSeccao) {
                             // dd('funcionario com esse cargo!');
                             DB::rollBack();
                             return redirect()->back()->with('error', 'O Cargo de Chefia para a Secção de '.$seccao->designacao.' não se encontra disponível! ');
                         }
                     }
                 }
             }
        if ($funcionario) {
            DB::commit();
            return redirect()->back()->with('success', 'Funcionário Cadastrado com sucesso!');
        }else{
            DB::rollBack();
            return redirect()->back()->with('aviso', 'Erro de Cadastrado Funcionário!')->withErrors($request);
        }
    }
        
    }

      //Update
      public function update(Request $request, string $id)
      { 
        // Verificar se campos de Nomeação Foram alterados fazendo comparação dos campos submetidos com campos do funcionário
        $funcionario = Funcionario::find($id);
        if ( $request->idUnidadeOrganica != $funcionario->idUnidadeOrganica || $request->idCargo != $funcionario->idCargo || $request->idSeccao != $funcionario->idSeccao ) {  
        // dd('Cargo de Chefia ou nomeacao');
            //Verificar se ja existe uma nomeação pendente
           $nomeacao = Processo::where('categoria', "Nomeacao")->where('idFuncionarioSolicitante', $id)->where('estado', "Submetido")->exists();
           $nomeFuncionarioSolicitante = Pessoa::find(Funcionario::find($id)->idPessoa)->nomeCompleto;
           if ($nomeacao) {
            return redirect()->back()->with('error', 'Já existe processo de nomeação pendente do Funcionário '.$nomeFuncionarioSolicitante.'!');
           }
           $FuncionarioSolicitante = Funcionario::find($id)->estado;
           if ($FuncionarioSolicitante === "Falecido" || $FuncionarioSolicitante === "Aposentado") {
            return redirect()->back()->with('error', 'O Funcionário '.$nomeFuncionarioSolicitante.' não pode ser nomeado por estar em estado Inactivo ou Aposentado!');
           }

           $request->validate([
                  'idCargo' => [
                      Rule::unique('funcionarios')->where( function($query) {
                          $query->where('idCargo', 8);
                      })->ignore($request->idCargo),
                  ],
              'numeroAgente' => ['numeric','required','unique:funcionarios,numeroAgente,'.$id],
              'dataAdmissao' => ['date','required','before_or_equal:now'],
              'iban' => ['string','required','unique:funcionarios,iban,'.$id], 
              'email' => ['email','max:255','nullable','unique:funcionarios,email,'.$id],
              'numeroTelefone' => ['between:9,14','unique:funcionarios,numeroTelefone,'.$id],    
              ], [
                  'idCargo.unique' => 'O Cargo de Director Muninipal não está Disponível!',
                  'numeroAgente.unique' => 'O Número de agente ja está sendo utilizado por outro usuário!',
                  'numeroAgente.required' => 'O Número de Agente é Obrigatório!',
                  'numeroAgente.numeric' => 'O Número de Agente deve ser um numero!',
                  'dataAdmissao.before_or_equal' => 'A data de Admissão deve ser antes do dia de Hoje!', 
                  'dataAdmissao.required' => 'A data de Admissão é Obrigatória!',
                  'iba.unique' => 'O Iban ja está sendo utilizado por outro usuário!',
                  'numeroTelefone.unique' => 'O Numero de Telefone já está sendo utilizado por outro usuário!', 
              ]);
              $dados =$request->all();
              $dados['categoria'] = 'Nomeacao';
              $dados['natureza'] = 'Despacho';
              $dados['idFuncionarioSolicitante'] = $id;
              $natureza = 'Despacho';
              $cargoDirectorEscola = false;
              $cargoChefeSeccao = false;
              //Verificações da natureza da nomeação
              $cargo = Cargo::find($request->idCargo);
              $seccao= Seccao ::find($request->idSeccao);
             
              //Verificar se é Nomeaçao de Cargo de Director de Escola
              if ( $cargo->codNome === "DirectorEscola" ) {
                   // Verificar de o cargo de Director para uma deternminaa Escola está disponivel
                   $verificarCargoDirectorEscola= Funcionario::where('idUnidadeOrganica', $request->idUnidadeOrganica)->where('idCargo', 5)->exists();
                   if ($verificarCargoDirectorEscola) {
                   return redirect()->back()->with('error', 'O Cargo à Director para essa Escola não se encontra Disponível ');
               }else {
                    $cargoDirectorEscola = true;
                    $dados['cargoDirectorEscola'] = $cargoDirectorEscola;
               }
              }
              //Verificar se é Nomeação de Cargo de Chefe de Secção
              if ( $cargo->codNome === "ChefeSeccao" ) {
                    // Verificar de o cargo de Chefe de Secção está disponivel
                    $verificarChefeSeccao = Funcionario::where('idcargo', $cargo->id)->where('idSeccao', $seccao->id)->exists();
                    if ($verificarChefeSeccao) {
                    return redirect()->back()->with('error', 'O Cargo de Chefia para a Secção de '.$seccao->designacao.' não se encontra disponível! ');
                }else {
                    $cargoChefeSeccao = true;
                    $dados['cargoChefeSeccao'] = $cargoChefeSeccao;
                }
              }
            $dados =  http_build_query($dados);
            return redirect()->route('update.funcionario', ['dados' => $dados]);
            //return redirect()->route('funcionarios.nomeacao', ['numeroAgente' => $request->numeroAgente,'idUnidadeOrganica' => $request->idUnidadeOrganica,'motivo' => 'SN','categoria' => 'Nomeacao','natureza' => 'Despacho', 'idCargo' => $cargo->id]);
        }

       // dd('É edicao de funcionario!');
        DB::beginTransaction();
        //Isolar ou identificar o Registro a Ser Alterado
        $funcionario = Funcionario::where('id', $id)->first();
        //Iniciar actualização
        $funcionario->numeroAgente = $request->numeroAgente;
        $funcionario->idCategoriaFuncionario = $request->idCategoriaFuncionario;
        $funcionario->idCargo = $request->idCargo;
        $funcionario->idSeccao = $request->idSeccao;
        $funcionario->idUnidadeOrganica = $request->idUnidadeOrganica;
        $funcionario->iban = $request->iban;
        $funcionario->dataAdmissao = $request->dataAdmissao;
        $funcionario->numeroTelefone = $request->numeroTelefone;
          if ($funcionario->save()) {
              DB::commit();
              return redirect()->back()->with('success', 'Funcionário Actualizado com Sucesso!');
          }else {
              DB::rollBack();
              return redirect()->back()->with('error', 'Erro de Actualização do Funcionário! ');
          }
   }  
    //Update
    public function updatea(Request $request, string $id)
    {       
           // dd($request->all());
            $cargo = Cargo::find($request->idCargo);
            $seccao = Seccao ::find($request->idSeccao);
            //dd($cargo->permissoes);
            //Se o Update for para Funcionarios como: Directores Chefes de Seccao e Director Municipal Requerem Despachos de Nomeação
            
            if ( ($cargo->permissoes >= 3) && !($cargo->permissoes == 4) ){
                // Criar um método para submissao de transferencia 
                return redirect()->route('funcionarios.nomeacao', ['numeroAgente' => $request->numeroAgente,'idUnidadeOrganica' => $request->idUnidadeOrganica,'motivo' => 'SN','categoria' => 'Nomeacao','natureza' => 'Despacho', 'idCargo' => $cargo->id]);
            }
           // Verificar se o Cargo de Director da Escla esta Elegivel
           if ($cargo->codNome === "DirectorEscola") {
               // dd($cargoSubmetido->codNome);
                $funcionario = Funcionario::where('idUnidadeOrganica', $request->idUnidadeOrganica)->where('idCargo', 5)->exists();
                if ($funcionario) {
                    return redirect()->back()->with('error', 'O Cargo à Director para essa Escola não se encontra Disponível ');
                }else{
                    $request->validate([
                        'idCargo' => [
                            Rule::unique('funcionarios')->where( function($query) {
                                $query->where('idCargo', 8);
                            })->ignore($request->idCargo),
                        ],
                    'numeroAgente' => ['numeric','required','unique:funcionarios,numeroAgente,'.$id],
                    'dataAdmissao' => ['date','required','before_or_equal:now'],
                    'iban' => ['string','required','unique:funcionarios,iban,'.$id], 
                    //'email' => ['email','max:255','nullable','unique:funcionarios,email,'.$id],
                    'numeroTelefone' => ['between:9,14','unique:funcionarios,numeroTelefone,'.$id],    
                    ], [
                        'idCargo.unique' => 'O Cargo de Director Municipal não está Disponível!',
                        'numeroAgente.unique' => 'O Número de agente ja está sendo utilizado por outro usuário!',
                        'numeroAgente.required' => 'O Número de Agente é Obrigatório!',
                        'numeroAgente.numeric' => 'O Número de Agente deve ser um numero!',
                        'dataAdmissao.before_or_equal' => 'A data de Admissão deve ser antes do dia de Hoje!', 
                        'dataAdmissao.required' => 'A data de Admissão é Obrigatória!',
                        'iba.unique' => 'O Iban ja está sendo utilizado por outro usuário!',
                        //'email.unique' => 'O Email ja está sendo utilizado por outro usuário!', 
                        'numeroTelefone.unique' => 'O Numero de Telefone já está sendo utilizado por outro usuário!', 
                    ]);
                    DB::beginTransaction();
                    //Isolar ou identificar o Registro a Ser Alterado
                    $funcionario = Funcionario::where('id', $id)->first();
                    // $funcionario->dataAdmissao = $request->dataAdmissao;
                    $funcionario->numeroAgente = $request->numeroAgente;
                    $funcionario->idCategoriaFuncionario = $request->idCategoriaFuncionario;
                    $funcionario->idCargo = $request->idCargo;
                    $funcionario->idSeccao = $request->idSeccao;
                    $funcionario->idUnidadeOrganica = $request->idUnidadeOrganica;
                    $funcionario->iban = $request->iban;
                    //$funcionario->email = $request->email;
                    $funcionario->dataAdmissao = $request->dataAdmissao;
                    $funcionario->numeroTelefone = $request->numeroTelefone;
                        // iniciando a transacao para as alterações no registro
                        if ($funcionario->save()) {
                            DB::commit();
                         
                            return redirect()->back()->with('success', 'Registro atualizado com sucesso.');
                        }else {
                            DB::rollBack();
                            return redirect()->back()->with('error', 'Erro de Acualização nda Entidade Funionário! ');
                        }
                }
           }else{
            $request->validate([
                'idCargo' => [
                    Rule::unique('funcionarios')->where( function($query) {
                        $query->where('idCargo', 8);
                    })->ignore($request->idCargo),
                ],
            'numeroAgente' => ['numeric','required','unique:funcionarios,numeroAgente,'.$id],
            'dataAdmissao' => ['date','required','before_or_equal:now'],
            'iban' => ['string','required','unique:funcionarios,iban,'.$id], 
            //'email' => ['email','max:255','nullable','unique:funcionarios,email,'.$id],
            'numeroTelefone' => ['between:9,14','unique:funcionarios,numeroTelefone,'.$id],    
            ], [
                'idCargo.unique' => 'O Cargo de Director Muninipal não está Disponível!',
                'numeroAgente.unique' => 'O Número de agente ja está sendo utilizado por outro usuário!',
                'numeroAgente.required' => 'O Número de Agente é Obrigatório!',
                'numeroAgente.numeric' => 'O Número de Agente deve ser um numero!',
                'dataAdmissao.before_or_equal' => 'A data de Admissão deve ser antes do dia de Hoje!', 
                'dataAdmissao.required' => 'A data de Admissão é Obrigatória!',
                'iba.unique' => 'O Iban ja está sendo utilizado por outro usuário!',
                //'email.unique' => 'O Email ja está sendo utilizado por outro usuário!', 
                'numeroTelefone.unique' => 'O Numero de Telefone já está sendo utilizado por outro usuário!', 
            ]);
            DB::beginTransaction();
            //Isolar ou identificar o Registro a Ser Alterado
            $funcionario = Funcionario::where('id', $id)->first();
            // $funcionario->dataAdmissao = $request->dataAdmissao;
            $funcionario->numeroAgente = $request->numeroAgente;
            $funcionario->idCategoriaFuncionario = $request->idCategoriaFuncionario;
            $funcionario->idCargo = $request->idCargo;
            $funcionario->idSeccao = $request->idSeccao;
            $funcionario->idUnidadeOrganica = $request->idUnidadeOrganica;
            $funcionario->iban = $request->iban;
            //$funcionario->email = $request->email;
            $funcionario->dataAdmissao = $request->dataAdmissao;
            $funcionario->numeroTelefone = $request->numeroTelefone;
                // iniciando a transacao para as alterações no registro
                //Verificar  Eleicao para o Cargo de Chefe de Seccao
                  if ($cargo->codNome === "ChefeSeccao") {
                   // dd('E para cargos de chefia');
                    //Verificar se em todos os funcionarios já existir alguem da mesma seccao com o cargo de chefe de secção
                    $verificarChefeSeccao = Funcionario::where('idcargo', $cargo->id)->where('idSeccao', $seccao->id);
                    if ($verificarChefeSeccao) {
                         //Verificar  Eleicao para o Cargo de Chefe de Seccao
                         if ($cargo->codNome === "ChefeSeccao") {
                            //Verificar se em todos os funcionarios já existir alguem da mesma seccao com o cargo de chefe de secção
                            $verificarChefeSeccao = Funcionario::where('idcargo', $cargo->id)->where('idSeccao', $seccao->id)->exists();
                            if ($verificarChefeSeccao) {
                                // dd('funcionario com esse cargo!');
                                DB::rollBack();
                                return redirect()->back()->with('error', 'O Cargo de Chefia para a Secção de '.$seccao->designacao.' não se encontra disponível! ');
                            }
                        }
                    }
                }
                if ($funcionario->save()) {
                    DB::commit();
                    return redirect()->back()->with('success', 'Registro atualizado com sucesso.');
                }else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Erro de Acualização nda Entidade Funionário! ')->withErrors($request);
                }
           }
           
    }

    //Delete
    public function destroy(string $id)
    {
        //dd($id); //Teste de Debug And Dead
        // Encontrar o registro a ser excluído pelo ID
        $funcionario = Funcionario::find($id);
        if ($funcionario) {
            // Exclua o registro
            $funcionario->delete();
            // Redirecione de volta para a página desejada após a exclusão
            return redirect()->back()->with('success', 'Registro excluído com sucesso.');
        } else {
            // O registro não foi encontrado, faça o tratamento apropriado (por exemplo, redirecione com uma mensagem de erro)
            return redirect()->back()->with('error', 'Registro não encontrado, out erro de exclusao');
        }
    }
    public function formularioAvaliarDesempenhoFuncionario(Request $request)
    {
        //Blade com dados do funcionário
        $funcionarioCandidato = Funcionario::where('id', $request->input('idFuncionario'))->first();
        $pessoaCandidato = Pessoa::where('id', $funcionarioCandidato->idPessoa)->first();
        $cargoCandidato = Cargo::where('id', $funcionarioCandidato->idCargo)->first();
        $seccaoCandidato = Seccao::where('id', $funcionarioCandidato->idSeccao)->first();
        $unidadeOrganicaCandidato = UnidadeOrganica::where('id', $funcionarioCandidato->idUnidadeOrganica)->first();
        $categoriaFuncionarioCandidato = CategoriaFuncionario::where('id', $funcionarioCandidato->idCategoriaFuncionario)->first();
        return view('sgrhe/pages/forms/formulario-avaliacao-desempenho', compact('funcionarioCandidato','cargoCandidato','seccaoCandidato','pessoaCandidato','unidadeOrganicaCandidato','categoriaFuncionarioCandidato'));

    }
    public function estado(Request $request){
        $funcionario = Funcionario::find($request->id);
        $funcionario->estado = $request->estado;
        if ($funcionario->save()) {
            return redirect()->back()->with('success', 'Estado do Funcionário Alterado com Sucesso!');
        }else {
            return redirect()->back()->with('error', 'Erro ao alterar o Estado do Funcionário!');
        }
    }
    
    public function fichaFuncionario(Request $request){

        $categoria =$request->categoria; 
        $funcionario = Funcionario::where('id', $request->idFuncionario)->first();
        $pessoa = Pessoa::where('id', $funcionario->idPessoa)->first();
        $cargo =  Cargo::where('id', $funcionario->idCargo)->first();
        $categoriaFuncionario = categoriaFuncionario::where('id', $funcionario->idCategoriaFuncionario)->first();
        $unidadeOrganica = UnidadeOrganica::where('id', $funcionario->idUnidadeOrganica)->first();
        $idProcesso = $request['idProcesso'];
        //Carregar a View
        $Documento = PDF::loadView("sgrhe/modelos/$categoria",compact('pessoa','funcionario','cargo','categoriaFuncionario','unidadeOrganica','idProcesso'));      
        //Renderizar a View
        $Documento->render();
        //Nomear o Nome do Novo ficheiro PDF
        $fileName = 'file.pdf';
        //Retornar o Domunento Gerado 
       // return view("sgrhe/modelos/$categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));
        return response($Documento->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="'.$fileName.'"']);

    
    }
    public function regulamento(){
        return view('sgrhe/regulamento-interno-dme-puri');
    }
}
