<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Cargo;
use App\Models\Documento;
use App\Models\FormularioAproveitamento;
use App\Models\FotosUnidadeOrganica;
use App\Models\Funcionario;
use App\Models\Pessoa;
use App\Models\Aproveitamento;
use App\Models\UnidadeOrganica;
use App\Models\UnidadeOrganicaDado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UnidadeOrganicaController extends Controller
{
    //Verificar Se criar ou Editar par Exibir funcionario
        public function formulario($id = null)
     {
    //Se o $id for nulo é a criacao de um novo registro se nao é edicao
        $UnidadeOrganica = $id ? UnidadeOrganica::find($id):null;
        return view('sgrhe/pages/forms/unidadeorganica',compact('UnidadeOrganica'));
     }
    //Listar Unidades Organicas
    public function indexUnidadesOrganicas(Request $request)
    { 
        //dd($request->all());
        $nivelEnsino="";
        $titulo=$request->titulo;
        if ($request->nivelEnsino === "Todo") {
            $permissoes = Cargo::where('id', session()->only(['funcionario'])['funcionario']->idCargo )->first()->permissoes;
            if (  $permissoes == 'Admin' ) {
				//dd('cheguei');
                //Todos Os Privilegios
                $dados = UnidadeOrganica::where('id', '!=', 1)->get();
                return view('sgrhe/pages/tables/unidadeorganica',compact('dados','nivelEnsino','titulo'));
            }elseif($permissoes<=6 && $permissoes>=4){
                //Privilegios de Select para as Unidades Organicas
				//dd('cheguei');
                     $dados = UnidadeOrganica::where('id', '!=', 1)->get();
                return view('sgrhe/pages/tables/unidadeorganica',compact('dados','nivelEnsino','titulo'));
            }elseif ($permissoes<=3 && $permissoes>=2) {
                //Sera Redirecionad a Sua Unidade Organica com as Permissoes de Select e Create pra sua unidade Organica
                //Com o Acesso de Create para registros e Select
                $unidadeOrganicaSelected = UnidadeOrganica::where('id', session()->only(['funcionario'])['funcionario']->idUnidadeOrganica)->first();
                return view('sgrhe/unidade-organica-view',compact('unidadeOrganicaSelected','permissoes','nivelEnsino','titulo'));
            }elseif($permissoes <= 1){
                //Sem Acesso aos dados sobre unidade Organica e Sera Redirecionado ao Seu Perfil View
              
                route('perfil.show', ['idFuncionario' => session()->only(['funcionario'])['funcionario']->id ]);
            }
			$dados = UnidadeOrganica::where('id', '!=', 1)->get();
            return view('sgrhe/pages/tables/unidadeorganica',compact('dados','nivelEnsino','titulo'));
      
        }else {
            $nivelEnsino=$request->nivelEnsino;
        }
        //dd($nivelEnsino);
        $permissoes = Cargo::where('id', session()->only(['funcionario'])['funcionario']->idCargo )->first()->permissoes;
        if (  $permissoes == 'Admin' ) {
            //Todos Os Privilegios
            $dados = UnidadeOrganica::where('id', '!=', 1)->where('nivelEnsino',$nivelEnsino)->get();
            return view('sgrhe/pages/tables/unidadeorganica',compact('dados','nivelEnsino','titulo'));
        }elseif($permissoes<=6 && $permissoes>=4){
            //Privilegios de Select para as Unidades Organicas
            $dados = UnidadeOrganica::where('id', '!=', 1)->where('nivelEnsino',$nivelEnsino)->get();
            return view('sgrhe/pages/tables/unidadeorganica',compact('dados','nivelEnsino','titulo'));
        }elseif ($permissoes<=3 && $permissoes>=2) {
            //Sera Redirecionad a Sua Unidade Organica com as Permissoes de Select e Create pra sua unidade Organica
            //Com o Acesso de Create para registros e Select
            $unidadeOrganicaSelected = UnidadeOrganica::where('id', session()->only(['funcionario'])['funcionario']->idUnidadeOrganica)->first();
            return view('sgrhe/unidade-organica-view',compact('unidadeOrganicaSelected','permissoes','nivelEnsino','titulo'));
        }elseif($permissoes <= 1){
            //Sem Acesso aos dados sobre unidade Organica e Sera Redirecionado ao Seu Perfil View
          
            route('perfil.show', ['idFuncionario' => session()->only(['funcionario'])['funcionario']->id ]);
        }
        $dados = UnidadeOrganica::where('id', '!=', 1)->where('nivelEnsino',$nivelEnsino)->get();
        return view('sgrhe/pages/tables/unidadeorganica',compact('dados','nivelEnsino','titulo'));
    }


//Ver Detalhes Da Unidade Orgânica 
    public function show(string $idUnidadeOrganica)
    {
            $unidadeOrganicaSelected = UnidadeOrganica::where('id', $idUnidadeOrganica)->first();
            $Funcionarios = Funcionario::where('idUnidadeOrganica', $idUnidadeOrganica);

            $fotos = Arquivo::where('idFuncionario', 1)->where('categoria', 'FotosUnidadeOrganica')->where('descricao', $idUnidadeOrganica)->get();
            //dd($fotos);
            $dataActual = now();
            //Determinar o Ano Lectivo sabendo que Ele comeca sempre em setembro
            if ($dataActual->format('n') > 9) {
                $anoLectivo = $dataActual->format('Y').'/'.($dataActual->format('Y') + 1);
            }else {
                $anoLectivo = ($dataActual->format('Y') - 1).'/'.$dataActual->format('Y');
            } 

         //   $ultimoMapaAproveitamento = FormularioAproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->latest()->first();
            $aproveitamentosI = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'I')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            $aproveitamentosII = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'II')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            $aproveitamentosIII = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'III')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            $aproveitamentosFinal = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'Final')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            
            return view('sgrhe/unidade-organica-view',compact('aproveitamentosI','aproveitamentosII','aproveitamentosIII','aproveitamentosFinal','anoLectivo','unidadeOrganicaSelected','Funcionarios','fotos'));
    }

    public function galeriaUnidadeOrganica(string $idUnidadeOrganica)
    {
            $unidadeOrganicaSelected = UnidadeOrganica::where('id', $idUnidadeOrganica)->first();
            $Funcionarios = Funcionario::where('idUnidadeOrganica', $idUnidadeOrganica);
            $aproveitamento = FormularioAproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('id', 1)->first();
            $fotos = Arquivo::where('idFuncionario', 1)->where('categoria', 'FotosUnidadeOrganica')->where('descricao', $idUnidadeOrganica)->get();
            //dd($fotos);
            return view('sgrhe/galeria-organica',compact('unidadeOrganicaSelected','Funcionarios','fotos'));
    }

    //Dashboard Unidade Organica So Para Directores das Escolas
    
    public function dashboardUnidadeOrganicaShow(string $idUnidadeOrganica)
    {
            $unidadeOrganicaSelected = UnidadeOrganica::where('id', $idUnidadeOrganica)->first();
            $Funcionarios = Funcionario::where('idUnidadeOrganica', $idUnidadeOrganica);
            $fotos = Arquivo::where('idFuncionario', 1)->where('categoria', 'FotosUnidadeOrganica')->where('descricao', $idUnidadeOrganica)->get();
            $dataActual = now();
            //Determinar o Ano Lectivo sabendo que Ele comeca sempre em setembro
            if ($dataActual->format('n') > 9) {
                $anoLectivo = $dataActual->format('Y').'/'.($dataActual->format('Y') + 1);
            }else {
                $anoLectivo = ($dataActual->format('Y') - 1).'/'.$dataActual->format('Y');
            } 
            $aproveitamentosI = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'I')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            $aproveitamentosII = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'II')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            $aproveitamentosIII = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'III')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            $aproveitamentosFinal = Aproveitamento::where('idUnidadeOrganica', $idUnidadeOrganica)->where('trimestre', 'Final')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
            return view('sgrhe/unidade-organica-dashboard',compact('aproveitamentosI','aproveitamentosII','aproveitamentosIII','aproveitamentosFinal','anoLectivo','unidadeOrganicaSelected','Funcionarios','fotos'));

    }
    //Create
    public function store(Request $request)
    {
        $request->validate([
            'designacao' => ['required','string', 'max:255'],
            'descricao' => ['required','string', 'max:255'],
            'eqt' => ['required', 'string', 'max:255', 'unique:unidade_organicas,eqt'],
            'decretoCriacao' => ['string', 'max:255'],
            'localidade' => ['required','string', 'max:255'],
            'coordenadasGeograficas' => ['string', 'max:255'],
            'telefone' => ['string', 'max:255','unique:unidade_organicas,telefone'],
            'email' => ['email', 'max:255','unique:unidade_organicas,email'],
        ], [
            'eqt.unique' => 'A Unidade Orgânica '.$request->input('eqt').' já foi definida no Sistema!',
            'telefone.unique' => 'Telefone em uso em outra Instituição!',
            'email.unique' => 'Email em uso por outra Instituição!',
        ]);

    $registro=UnidadeOrganica::create([
        'designacao' => ucwords(strtolower($request->input('designacao'))),
        'descricao' => $request->input('descricao'),
        'eqt'=> $request->input('eqt'),
        'decretoCriacao' => $request->input('decretoCriacao'),
        'coordenadasGeograficas' => $request->input('coordenadasGeograficas'),
        'localidade' => ucwords(strtolower($request->input('localidade'))),
        'telefone' => $request->input('telefone'),
        'email' => strtolower($request->input('email')),  
    ]); 
    if ($registro) {
        return redirect()->route('unidadeorganicas.form')->with('success', 'Unidade Orgânica, '.$request->designacao.' cadastrada com sucesso!');
    } else {
        
    }
    return redirect()->route('unidadeorganicas.form')->with('error', 'Erro ao cadastrar uma nova Unidade Orgânica!')->withErrors($request)->withInput();
    }
    //Update 
    public function update(Request $request, string $id)
    {   //dd($request->all());
        $request->validate([
            'designacao' => ['required','string', 'max:255'],
            'descricao' => ['required','string', 'max:255'],
            'eqt' => ['required', 'string', 'max:255', 'unique:unidade_organicas,eqt,'.$id.''],
            'decretoCriacao' => ['string', 'max:255'],
            'coordenadasGeograficas' => ['string', 'max:255'],
            'localidade' => ['required','string', 'max:255'],
          //  'telefone' => ['string', 'max:255','unique:unidade_organicas,telefone,'.$id.''],
           // 'email' => ['email', 'max:255','unique:unidade_organicas,email,'.$id.''],
        ], [
            'eqt.unique' => 'A Unidade Orgânica '.$request->input('eqt').' já foi definida no Sistema!',
            'telefone.unique' => 'Telefone em uso por outra Instituição!',
            'email.unique' => 'Email em uso por outra Instituição!',
        
        ]);

        $UnidadeOrganica = UnidadeOrganica::where('id', $id)->first();
        $UnidadeOrganica->designacao = ucwords(strtolower($request->designacao));
        $UnidadeOrganica->descricao = $request->descricao;
        $UnidadeOrganica->eqt = $request->eqt;
        $UnidadeOrganica->decretoCriacao = $request->decretoCriacao;
        $UnidadeOrganica->localidade = ucwords(strtolower($request->localidade));
        $UnidadeOrganica->coordenadasGeograficas = $request->coordenadasGeograficas;
        $UnidadeOrganica->telefone = $request->telefone;
        $UnidadeOrganica->email = strtolower($request->email);
        //Converter antes o array de nivel de ensino
        $niveldeEnsino = "";
        $decodedQueryString = urldecode(http_build_query($request->nivelEnsino));
        foreach (explode("&", $decodedQueryString) as $pair) {
            list($key, $value) = explode("=", $pair);
            $niveldeEnsino .= $value.", ";
        }
        //dd($niveldeEnsino);
        $UnidadeOrganica->nivelEnsino = $niveldeEnsino;
        // Salvando as Alteracoes do Registro
        if ($UnidadeOrganica->save()) {
            return redirect()->back()->with('success', 'Unidade Orgânica, '.$request->designacao.' foi atualizada com sucesso.');

        }else {
            return redirect()->back()->with('error', 'Erro actualizar uma nova Unidade Orgânica '.$request->designacao.'!')->withErrors($request)->withInput();

        }


        // Redirecione de volta para a página de listagem ou para onde você desejar

    }

    public function formularioAproveitamentoUnidadeOrganica(Request $request){
            $idUnidadeOrganica = $request->input('idUnidadeOrganica');
            $unidadeOrganicaSelected = UnidadeOrganica::where('id', $idUnidadeOrganica)->first();
            $anoLectivo = $request->input('anoLectivo');
            $trimestre = $request->input('trimestre');
            return view('sgrhe/pages/forms/unidade-organica-formulario-aproveitamento',compact('anoLectivo','unidadeOrganicaSelected','trimestre'));

    }

    public function AddFotosUO(Request $request)
    {
        //dd($request->all());
       
        
        $verificar = $request->validate([
            //Form Request Pesquisar e implementar
        ]);
        $categoria = "FotosUnidadeOrganica";
        $idUnidadeOrganica = $request->input('idUnidadeOrganica');
        $foto = $request->file('arquivo');
        $nomeArquivo = $categoria.'-'.date('d-m-y-H-i-s').'.'.$foto->extension();
        $caminho = 'unidadeorganicas/'.$idUnidadeOrganica.'/'.$categoria.'/'.$nomeArquivo;
        // Armazenar o arquivo no subdiretório dentro da pasta 'local Especifico'
        //Procurar um outro metodo para o put que guarada com nme personalizado
        $save = Storage::disk('local')->put($caminho, file_get_contents($foto));
        if ($save) {
        //DB::beginTransaction();
        $Arquivo = Arquivo::create([
            'titulo' => md5($nomeArquivo),
            'categoria' => $categoria,
            'descricao' => $idUnidadeOrganica,
            'arquivo' => $nomeArquivo,
            'caminho' => $caminho,
            'idFuncionario' => 1,
        ]);
        
        if ($Arquivo) {
            $idArquivo = Arquivo::where('idFuncionario', 1)->where('categoria', $categoria)->where('descricao', $idUnidadeOrganica)->latest()->first()->id;
            //dd($idArquivo);
            $fotosUnidadeOrganica = FotosUnidadeOrganica::create([
                'idUnidadeOrganida' => $request->idFuncionario,
                'idArquivo' => $idArquivo,
            ]);
            if ($fotosUnidadeOrganica) {
              //  DB::commit();
                return redirect()->back()->with('success', 'Foto Adicionada com sucesso!');
            }else {
               // DB::rollBack();
                return redirect()->back()->back()->with('error', 'Erro ao Adicionar foto!');
            }
        }else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao Adicionar foto!');
        }  
        }
      
    }


    

}
