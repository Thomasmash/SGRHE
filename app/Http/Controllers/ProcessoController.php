<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Cargo;
use App\Models\CategoriaFuncionario;
use App\Models\Funcionario;
use App\Models\Pessoa;
use App\Models\Processo;
use App\Models\Seccao;
use App\Models\UnidadeOrganica;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class ProcessoController extends Controller
{

    public function darParecer(Request $request)
    {
        // dd($request->all());
        //Salvar Aquivo
        $D = $request->Request;
        //Converetr o Request String Em Request Array
        parse_str($D, $Request);
        //dd($Request);
        $funcionarioSolicitante = Funcionario::find($Request['idFuncionarioSolicitante'])->first();
        //dd($nomeFuncionario); 
        $Documento = $request->file('arquivo');
        //Nomear o Nome do Novo ficheiro PDF
        $nomeFuncionario = Pessoa::find($funcionarioSolicitante->idPessoa)->first()->nomeCompleto;
        $fileName = $nomeFuncionario.'-'.date('dmYHis').'.pdf';
        $caminho = 'sgrhe/funcionarios/'.$Request['idFuncionarioSolicitante'].'/'.$Request['categoria'].'/'.$fileName;
        //dd($Documento);
        // Armazenar o arquivo no subdiretório dentro da pasta 'local Especifico'
        $save = Storage::disk('local')->put($caminho, file_get_contents($Documento));
        // DB::beginTransaction();
        $Arquivo = Arquivo::create([
            'titulo' => md5($fileName),
            'categoria' => $Request['categoria'],
            'descricao' => http_build_query($Request),
            'arquivo' => $fileName,
            'caminho' => $caminho,
            'idFuncionario' => $Request['idFuncionarioSolicitante'],
        ]);
        if ($request->parecer == "Favoravel") {
            if ($Arquivo) {
                $idArquivo = Arquivo::where('idFuncionario', $Request['idFuncionarioSolicitante'])->where('categoria', $Request['categoria'] )->latest()->first()->id;
                $Processo = Processo::where('id', $request['idProcesso'])->first();
                //dd($Processo);
                if ($save) {
                    $idArquivo = Arquivo::where('idFuncionario', $Request['idFuncionarioSolicitante'])->where('categoria', $Request['categoria'] )->latest()->first()->id;
                    $Processo = Processo::where('id', $request['idProcesso'])->first();
                    $Processo->idArquivo = $idArquivo;
                    $Processo->ratificador = session()->only(['funcionario'])['funcionario']->id;
                    $Processo->estado = "Aprovado";
                    $Processo->deferimento = $request->input('parecer');
                    //Se Categoria for Transferencia ou Nomeacao ou Edicao Efectivara a Mudanca nesta Sec
                    if ($Request['categoria']=="Transferencia") {
                        $funcionario = Funcionario::find($Request['idFuncionarioSolicitante']);
                        // dd($funcionario);
                        $funcionario->idUnidadeOrganica = $Request['idUnidadeOrganica'];
                        //Se a pessoa a ser Trasferida for Director 
                        $cargoFuncionarioSolicitante = Cargo::where('id', Funcionario::find($Request['idFuncionarioSolicitante'])->idCargo)->first()->designacao;
                        if ($cargoFuncionarioSolicitante === "Director da Escola") {
                            //Rebaixado para cargo de Professor cujo o id Cargo e 3
                            $funcionario->idCargo = 3;
                        }
                        $funcionario->save();   
                    }
                    if ($Request['categoria'] == "Nomeacao") {
                    //Efectivar as Mudancas para o Funcionário  //23121997
                    //DB::beginTransaction();
                    //Isolar ou identificar o Registros a Serem Alterados
                    //Iniciar actualização
                        //$Processo = Processo::where('id', $request['idProcesso'])->first();
                        $Processo->estado = "Aprovado";
                        //$Processo->save();
                        $funcionario = Funcionario::where('id', $Request['idFuncionarioSolicitante'])->first();
                        $funcionario->numeroAgente = $Request['numeroAgente'];
                        $funcionario->idCategoriaFuncionario =  $Request['idCategoriaFuncionario'];
                        $funcionario->idCargo =  $Request['idCargo'];
                        $funcionario->idSeccao =  $Request['idSeccao'];
                        $funcionario->idUnidadeOrganica =  $Request['idUnidadeOrganica'];
                        $funcionario->iban =  $Request['iban'];
                        $funcionario->dataAdmissao =  $Request['dataAdmissao'];
                        $funcionario->numeroTelefone =  $Request['numeroTelefone'];
                        $funcionario->save();
                    }
                    //Se Categoria for Licenca
                    if ($Request['categoria'] == "Licenca") {
                    //Isolar ou identificar o Registros a Serem Alterados
                    //Iniciar actualização
                       //$Processo = Processo::where('id', $request['idProcesso'])->first();
                       $Processo->estado = "Aprovado";
                       //$Processo->save();
                       $funcionario = Funcionario::where('id', $Request['idFuncionarioSolicitante'])->first();
                       $funcionario->estado = 'Licenca';
                       $funcionario->save();
                    }
                    if ($Request['categoria'] == "GozoFerias") {
                        //Isolar ou identificar o Registros a Serem Alterados
                    //Iniciar actualização
                       $Processo = Processo::where('id', $request['idProcesso'])->first();
                       $Processo->idArquivo = $idArquivo;
                       $Processo->estado = "Aprovado";
                       //$Processo->save();
                       $funcionario = Funcionario::where('id', $Request['idFuncionarioSolicitante'])->first();
                       $funcionario->estado = 'Licenca';
                       $funcionario->save();
                      }
                    if ($Processo->save()) {
                        return redirect()->back()->with('success', 'Parecer aplicado com sucesso!');
                    } 
                }else {
                    //DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao Salvar o Arquivo!');
                }
            }else {
                //DB::rollBack();
                return redirect()->back()->with('error', 'Arquivo com formato inválido!');
            }
            
        }else{
            if ($Arquivo) {
                if ($save) {
                    $idArquivo = Arquivo::where('idFuncionario', $Request['idFuncionarioSolicitante'])->where('categoria', $Request['categoria'] )->latest()->first()->id;
                    $Processo = Processo::where('id', $request['idProcesso'])->first();
                    $Processo->idArquivo = $idArquivo;
                    $Processo->ratificador = session()->only(['funcionario'])['funcionario']->id;
                    $Processo->estado = 'Desfavoravel';
                    $Processo->deferimento = $request->input('parecer');
                    if ($Processo->save()) {
                        return redirect()->back()->with('success', 'Parecer aplicado com sucesso!');
                    }  
                }else {
                    //DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao Salvar o Arquivo!');
                }
            }
        }
    }

    /*
    public function parecer(Request $request)
    {
       dd($request->all());
        //Compilando o Documento Ratificado
        //Reconversao do Submit do formularo armazenado no banco de dados
        $D = $request->Request;
        //Converetr o Request String Em Request Array
        parse_str($D, $Request);
        //dd($Request['seccao']);
        $funcionario = Funcionario::where('id', $Request['idFuncionarioSolicitante'])->first();
        $pessoa = Pessoa::where('id', $funcionario->idPessoa)->first();
        $cargo =  Cargo::where('id', $funcionario->idCargo)->first();
        $categoriaFuncionario = categoriaFuncionario::where('id', $funcionario->idCategoriaFuncionario)->first();
        $unidadeOrganica = UnidadeOrganica::where('id', $funcionario->idUnidadeOrganica)->first();
        $idProcesso = $request['idProcesso'];
        $categoria = $Request['categoria'];
       // dd($categoria);
        //Carregar a View
        //Definir Ratificador
        $idRatificador = session()->only(['funcionario'])['funcionario']->id;
        $Documento = PDF::loadView("sgrhe/modelos/$categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario','idRatificador','unidadeOrganica','idProcesso'));      
        //Renderizar a View
        $Documento->render();
        //Nomear o Nome do Novo ficheiro PDF
        $nomeFuncionario = Pessoa::find($funcionario->idPessoa)->nomeCompleto;
        $fileName = $nomeFuncionario.'-'.$categoria.date('dmYHis').'.pdf';
        //Retornar o Domunento Gerado 
       // return response($Documento->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="'.$fileName.'"']);
        //return $Documento->download('file.pdf');
        //Armazenar o Conteudo PDF em uma Variavel
        $pdfContent = $Documento->output();
        $caminho = 'sgrhe/funcionarios/'.$funcionario->idPessoa.'/'.$categoria.'/'.$fileName;
        // Armazenar o arquivo no subdiretório dentro da pasta 'local Especifico'
        $save = Storage::disk('local')->put($caminho, $pdfContent);
        $Arquivo = Arquivo::create([
            'titulo' => md5($fileName),
            'categoria' => $categoria,
            'descricao' => http_build_query($request->all()),
            'arquivo' => $fileName,
            'caminho' => $caminho,
            'idFuncionario' => $funcionario->id,
        ]);
        if ($Arquivo) {
            $idArquivo = Arquivo::where('idFuncionario', $funcionario->id)->where('categoria', $categoria)->latest()->first()->id;
            $Processo = Processo::where('id', $request['idProcesso'])->first();
            //dd($Processo);
            if ($save) {
                $estado = $request->input('parecer');
                if ($request->input('parecer') == 'Favoravel') {
                    $estado = 'Aprovado';
                } 
                DB::beginTransaction();
                $Processo->update([
                    'idArquivo' => $idArquivo,
                    'ratificador' => session()->only(['funcionario'])['funcionario']->id,
                    'estado' => $estado,
                    'deferimento' => $request->input('parecer'),
                    
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Ratificado com sucesso!');
            }
           DB::rollBack();
           return redirect()->back()->with('error', 'Erro ao Salvar o registro!');
        }
        DB::rollBack();
        return redirect()->back()->with('error', 'Erro ao Ratificar!');
    
        //Registro o Processo no Bango de dados e Salvamento do Arquivo Gerado no Banco de Dados 
    }
*/

    public function ratificar(Request $request)
    {
        dd($request->all());
        //Compilando o Documento Ratificado
        //Reconversao do Submit do ormularo armazenado no banco de dados
        $D = $request->Request;
        //Converetr o Request String Em Request Array
        parse_str($D, $Request);
        //dd($Request['seccao']);
        $funcionario = Funcionario::where('id', $Request['idFuncionarioSolicitante'])->first();
        $pessoa = Pessoa::where('id', $funcionario->idPessoa)->first();
        $cargo =  Cargo::where('id', $funcionario->idCargo)->first();
        $categoriaFuncionario = categoriaFuncionario::where('id', $funcionario->idCategoriaFuncionario)->first();
        $idProcesso = $request['idProcesso'];
        $categoria = $Request['categoria'];
        //Carregar a View
        //Definir Ratificador
        $idRatificador = session()->only(['funcionario'])['funcionario']->id;
        $Documento = PDF::loadView("sgrhe/modelos/$categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario','idRatificador','idProcesso'));      
        //Renderizar a View
        $Documento->render();
        //Nomear o Nome do Novo ficheiro PDF
        $nomeFuncionario = Pessoa::find($funcionario->idPessoa)->nomeCompleto;
        $fileName = $nomeFuncionario.'-'.$categoria.date('dmYHis').'.pdf';
        //Retornar o Domunento Gerado 
       // return response($Documento->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="'.$fileName.'"']);
        //return $Documento->download('file.pdf');
        //Armazenar o Conteudo PDF em uma Variavel
        $pdfContent = $Documento->output();
        $caminho = 'sgrhe/funcionarios/'.$funcionario->idPessoa.'/'.$categoria.'/'.$fileName;
        // Armazenar o arquivo no subdiretório dentro da pasta 'local Especifico'
        $save = Storage::disk('local')->put($caminho, $pdfContent);
        $Arquivo = Arquivo::create([
            'titulo' => md5($fileName.now()),
            'categoria' => $categoria,
            'descricao' => http_build_query($request->all()),
            'arquivo' => $fileName,
            'caminho' => $caminho,
            'idFuncionario' => $funcionario->id,
        ]);
        if ($Arquivo) {
            $idArquivo = Arquivo::where('idFuncionario', $funcionario->id)->where('categoria', $categoria)->latest()->first()->id;
            $Processo = Processo::where('id', $request['idProcesso'])->first();
            if ($save) {

                DB::beginTransaction();
                $Processo->update([
                    'idArquivo' => $idArquivo,
                    'ratificador' => session()->only(['funcionario'])['funcionario']->id,
                    'estado' => "Aprovado",
                    'deferimento' => "Favoravel",
                    
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Ratificado com sucesso!');
            }
           DB::rollBack();
           return redirect()->back()->with('error', 'Erro ao Salvar o registro!');
        }
        DB::rollBack();
        return redirect()->back()->with('error', 'Erro ao Ratificar!');
    
        //Registro o Processo no Bango de dados e Salvamento do Arquivo Gerado no Banco de Dados 
    }



    /* Previsualizar um documento antes da Ratificação
     */

    public function preview(Request $request)
    {
        //Reconversao do Submit do ormularo armazenado no banco de dados //23121997
        $D = $request->Request;
        parse_str($D, $Request);
        //dd($Request);
        $categoria = $Request['categoria'];
        //Verificar se nao [e uma requisicao para imprimir um documento como guia de colocacao de marcha ou um outro documanto solicitado via requerimento
        if (isset($request->imprimir)) {
            $categoria = $request->imprimir;
        }

        //dd($unidadeOrganicaOndeVai) //23121997;
        $funcionarioProcessador = Funcionario::where('numeroAgente',  Auth::user()->numeroAgente)->first();
        $funcionario = Funcionario::where('id', $Request['idFuncionarioSolicitante'])->first();
        $pessoa = Pessoa::where('id', $funcionario->idPessoa)->first();
        $cargo =  Cargo::where('id', $funcionario->idCargo)->first();
        $categoriaFuncionario = categoriaFuncionario::where('id', $funcionario->idCategoriaFuncionario)->first();
        $unidadeOrganica = UnidadeOrganica::where('id', $funcionario->idUnidadeOrganica)->first();
        $categoriaProcesso = $Request['categoria'];

        $idProcesso = $request['idProcesso'];
        //Verificar se nao é uma guia de Transferencia
        if(($Request['categoria'] === "Transferencia") || ($Request['categoria'] === "Nomeacao")){
        $unidadeOrganicaOndeVai = UnidadeOrganica::where('id', $Request['idUnidadeOrganica'])->first();
        }else{
        $unidadeOrganicaOndeVai = "";
        }
        //Verificar se não é uma 
        if (($Request['categoria'] === "Nomeacao")) {
            $cargoOndeVai =  Cargo::where('id', $Request['idCargo'])->first();
        }else {
            $cargoOndeVai = "";
        }
        //Carregar a View
        $Documento = PDF::loadView("sgrhe/modelos/$categoria",compact('unidadeOrganicaOndeVai','cargoOndeVai','Request','pessoa','funcionario','funcionarioProcessador','cargo','categoriaFuncionario','unidadeOrganica','idProcesso','categoriaProcesso'));      
        //Renderizar a View
        $Documento->render();
        //Nomear o Nome do Novo ficheiro PDF
        $nomeFuncionario = Pessoa::find($funcionario->idPessoa)->nomeCompleto;
        $fileName = $nomeFuncionario.'-'.$categoria.'.pdf';
        //Retornar o Domunento Gerado 
       // return view("sgrhe/modelos/$categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));
        return response($Documento->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="'.$fileName.'"']);

        //return $pdf->download('file.pdf');
       //$pdf->render();

       
        //Registro o Processo no Bango de dados e Salvamento do Arquivo Gerado no Banco de Dados 

       

    }




    //Solicitar Processos Genericos 
    public function solicitar(Request $request)
    { 
        //Verificar se é processo de aposentadoria 
        if (isset($request['confirmar'])) {
            if ($request['confirmar'] === "false") {
                return redirect()->back()->with('error', 'Processo de aposentadoria Canselado com sucesso!');
            }
        }
       //Verificar Status do Funcionário se é aplicavel para Socicitacao do servico //23121997
       $FuncionarioSolicitante = Funcionario::find($request->idFuncionarioSolicitante)->estado;
       if ($FuncionarioSolicitante === "Falecido" || $FuncionarioSolicitante === "Aposentado") {
        return redirect()->back()->with('error', 'O Funcionário  não pode solicitar serviços por estar em estado Inactivo ou Aposentado, em caso de erro dirija-se a Repartição Municipal da Educação');
       }
       
        if (($request->categoria=="GozoFerias") && (isset($request->dataInicio))) {
            $request->validate([
                'dataInicio' => ['required', 'date', 'after_or_equal:today'],
            ],[
                //Menssagem personalizada 
                'dataInicio.after_or_equal' => 'Não é possivel solicitar férias antes do dia de Hoje',
    
            ]);
        }
        //dd('Solicitar');
        $request->validate([
            'categoria' => [
                Rule::unique('processos')->where( function($query) use ($request){
                    return $query->where('categoria', $request->categoria)
                    ->where('idFuncionarioSolicitante', $request->idFuncionarioSolicitante)
                    ->where('estado', 'Submetido');
                }), 
            ],
        ],[
            //Menssagem personalizada 
            'categoria' => 'Já existe uma solicitação da mesma natureza pendente, Cancele para submisão de uma nova ou aguarde o deferimento!',

        ]);
        $processo = Processo::create([
            // Recupera o id do funcionario logado pela sessao 
            'idFuncionario' => session()->only(['funcionario'])['funcionario']->id,
            'idFuncionarioSolicitante' => $request->input('idFuncionarioSolicitante'),
            'seccao' =>  $request->input('seccao'),
            'categoria' => $request->input('categoria'),
            'natureza' => $request->input('natureza'),
            'estado' => 'Submetido',
            //'deferimento' => $request->input('deferimento'),
            //Dados do Request Arasenados em string no campo Request
            'Request' => http_build_query($request->all()) //implode(', ', $request->all()),
            //Anexos, Dependencias Tipo Documentos e Outras Imformacoes para se efectivar um determinado processo 
         ]);
         DB::beginTransaction();
         if ($processo) {
            DB::commit();
            return redirect()->back()->with('success', 'Solicitacao aplicada com Sucesso!');     
         }
         DB::rollBack();
         return redirect()->back()->with('error', 'Erro de aplicação');   
    }

        public function updateFuncionario(string $dados)
        {
                //Repor o array
                parse_str($dados, $Request);
                //dd($Request);
                $funcionario = Funcionario :: where('numeroAgente', $Request['numeroAgente'])->first();
                //Verificar se ja existe um processo de Despacho de Nomeação para o mesmo funcionario
                $nomeacao = Processo::where('natureza', $Request['natureza'])->where('categoria', $Request['categoria'])->where('estado', "Submetido")->where('idFuncionarioSolicitante', $funcionario->id)->exists();
                if (!$nomeacao) {
                $processo = Processo::create([
                    // Recupera o id do funcionario logado pela sessao 
                    'idFuncionario' => session()->only(['funcionario'])['funcionario']->id,
                    'idFuncionarioSolicitante' => $funcionario->id,
                    'seccao' => 'RHPE',
                    'categoria' => $Request['categoria'],
                    'natureza' => $Request['natureza'],
                    'estado' => 'Submetido',
                    //'deferimento' => $request->input('deferimento'),
                    //Dados do Request Armasenados em string no campo Request
                    'Request' => http_build_query($Request) //implode(', ', $request->all()),
                    //Anexos, Dependencias Tipo Documentos e Outras Imformacoes para se efectivar um determinado processo 
                ]);
                DB::beginTransaction();
                if ($processo) {
                    DB::commit();
                    return redirect()->back()->with('success', 'Nomeacão  aplicada com Sucesso!');     
                }
                DB::rollBack();
                return redirect()->back()->with('error', 'Erro de aplicação'); 
            }else {
                return redirect()->back()->with('error', 'O Funcionário '.Pessoa::find($funcionario->idPessoa)->nomecompleto.', já tem um Despacho de Nomeação pendente!'); 
            }
        }



/*
    public function gerarDocumento(Request $request, string $idFuncionarioSolicitante)
    {

        $funcionario = Funcionario::where('id', $idFuncionarioSolicitante)->first();
        $pessoa = Pessoa::where('id', $funcionario->idPessoa)->first();
        $cargo =  Cargo::where('id', $funcionario->idCargo)->first();
        $categoriaFuncionario = categoriaFuncionario::where('id', $funcionario->idCategoriaFuncionario)->first();
        $Request = $request->all();
        //dd($dados);
        $pdf = PDF::loadView("sgrhe/modelos/$request->categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));      
        //return $pdf->download('apenso.pdf');
        return view("sgrhe/modelos/$request->categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));
        //Registro o Processo no Bango de dados e Salvamento do Arquivo Gerado no Banco de Dados 
    }

    //Funcao geradora de Documento Universal via Request
    public function gerarDocFormRequest(Request $request)
    {
        
        $Request = $request->all();
        //dd($dados);
        $pdf = PDF::loadView("sgrhe/modelos/$request->categoria",compact('Request'));      
        //return $pdf->download('apenso.pdf');
        return view("sgrhe/modelos/$request->categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));
        //Registro o Processo no Bango de dados e Salvamento do Arquivo Gerado no Banco de Dados 
    }
        //Funcao geradora de Documento Universal via Request
    public function gerarDoc(string $Request)
    {
        dd($Request);
        //$pdf = PDF::loadView("sgrhe/modelos/$request->categoria",compact('Request'));      
        //return $pdf->download('apenso.pdf');
      //  return view("sgrhe/modelos/$request->categoria",compact('Request','pessoa','funcionario','cargo','categoriaFuncionario'));
        //Registro o Processo no Bango de dados e Salvamento do Arquivo Gerado no Banco de Dados 
    }
    */





    public function cancelar(string $idProcesso)
    {
         $Pross = Processo::where('id', $idProcesso)->first();
         DB::beginTransaction();
         $Pross->estado = 'Cancelado';
         if ($Pross->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'Solicitacao cancelada com Sucesso!');  
         }

    }

    //Listar os Processo de uma determinada Secao
    public function processosSeccao(string $seccao)
    {
        $idFuncionario = session()->only(['funcionario'])['funcionario']->id;
        $processos = Processo::orderBy('created_at', 'desc')->where('seccao', $seccao)->get();
        $funcionario = Funcionario::where('id',$idFuncionario)->first();
        $pessoa = Pessoa::where('id',$funcionario->idPessoa)->first();
        $cargo = Cargo::where('id',$funcionario->idCargo)->first();
        $unidadeOrganica = UnidadeOrganica::where('id',$funcionario->idUnidadeOrganica)->first();
        $categoriaFuncionario = CategoriaFuncionario::where('id',$funcionario->idCategoriaFuncionario)->first();
        //$arquivos = Arquivo::where('idFuncionario',$funcionario->id);
       // dd($processo);;
        return view('sgrhe/processos-seccao',compact('funcionario','pessoa','cargo','unidadeOrganica','categoriaFuncionario','processos'));
 
    }
    public function verProcessosFuncionario(Request $request)
    {
        $funcionarioSolicitante = Funcionario::find($request->idFuncionario);
        $processos = Processo::orderBy('created_at', 'desc')->where('idFuncionarioSolicitante', $funcionarioSolicitante->id)->get();
        $pessoaSolicitante = Pessoa::where('id',$funcionarioSolicitante->idPessoa)->first();
        return view('sgrhe/pages/tables/processos-funcionario',compact('funcionarioSolicitante','processos','pessoaSolicitante'));
 
    }

    public function verArquivosFuncionario(Request $request)
    {
       // dd('Processos');
        $funcionarioSolicitante = Funcionario::find($request->idFuncionario);
        $arquivos = Arquivo::orderBy('created_at', 'desc')->where('idFuncionario', $funcionarioSolicitante->id)->get();
        $pessoaSolicitante = Pessoa::where('id',$funcionarioSolicitante->idPessoa)->first();
        return view('sgrhe/pages/tables/arquivos-funcionario',compact('funcionarioSolicitante','arquivos','pessoaSolicitante'));
 
    }
    
    
    
}
