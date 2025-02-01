<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Naturalidade;
use App\Models\Parente;
use App\Models\Pessoa;
use App\Models\UnidadeOrganica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    //Formulario Create Edit pessoa
    public function formulario($id = null)
    {
       //Se o $id for nulo é a criacao de um novo registro se nao é edicao
       $pessoa = $id ? Pessoa::find($id):null;
       $parente = $id ? Parente::where('idPessoa', $pessoa->id)->first():null;
       $naturalidade = $id ? Naturalidade::where('idPessoa', $pessoa->id)->first():null;
       $endereco = $id ? Endereco::where('idPessoa', $pessoa->id)->first():null;
       return view('sgrhe/pages/forms/pessoa',compact('pessoa','parente','naturalidade','endereco'));
    }
	
    public function index()
    {
        $pessoas = Pessoa::where('id', '!=', 1)->get();
        //dd($pessoas->all());
        return view('sgrhe/pages/tables/pessoas',compact('pessoas'));
    }
	
    public function store(Request $request) 
    {
       // dd($request->all());
        $request->validate([
            'nomeCompleto' => ['string', 'max:255','required'],
            'dataNascimento' => ['date','required','before:' .now()->subYears(18)->format('Y-m-d')],
            'genero'=> ['string', 'max:9','required'],
            //'grupoSanguineo' => ['string','max:3'],
            'estadoCivil' => ['string'],
            'numeroBI' => ['required', 'string', 'max:14', 'unique:pessoas,numeroBI'],
//Validacao do Bilhete de Identidade            
		  // 'validadeBI' => ['date','required','after_or_equal:'.now()],
            'provincia' => ['string', 'max:255','required'],
            'municipio' => ['string', 'max:255','required'],
            'nomePai' => ['string', 'max:255','required'],
            'nomeMae' => ['string', 'max:255','required'],
            'idPessoa' => ['integer'],
        ], [
                'dataNascimento.required' => 'Data de Nascimento é um campo obrigatorio!',
                'dataNascimento.before' => 'Registro só é valido para maiors de 18 anos de idade!',
                'nomeCompleto.required' => 'O campo Nome Completo é Obrigatório!',
                'numeroBI.required' => 'O número de Bilhete de Identidade é Obrigatório!',
                'numeroBI.unique' => 'O número de BI inserido ja está sendo utilizado por outro usuário!',
                'validadeBI.required' => 'Data de Validade BI é um campo obrigatoria!',
                'validadeBI.after_or_equal' => 'Bilhete de Identidade com data de validade expirada!',
                'nomePai.required' => 'Insira o nome do Pai!',
                'nomeMae.required' => 'Insira o nome da Mãe!',
            ]);

        $pessoa = Pessoa::create([
            'nomeCompleto' => ucwords(strtolower($request->input('nomeCompleto'))),
            'dataNascimento' => $request->input('dataNascimento'),
            'genero'=> $request->input('genero'),
            'grupoSanguineo' => $request->input('grupoSanguineo') === null ? "N/D" : $request->input('grupoSanguineo'),
            'estadoCivil' => $request->input('estadoCivil'),
            'numeroBI' => mb_strtoupper($request->input('numeroBI')),
            'validadeBI' => $request->input('validadeBI'),  
        ]);
        //Inicio da Transacao
        if ($pessoa) {
            $idPessoa = Pessoa::where('numeroBI', $request->input('numeroBI'))->first()->id;
            $parente = Parente::create([
                'nomePai' => ucwords(strtolower($request->input('nomePai'))),
                'nomeMae' => ucwords(strtolower($request->input('nomeMae'))),
                'idPessoa' => $idPessoa,
             ]);
             if ($parente) {
                $naturalidade = Naturalidade::create([
                    'provincia' => $request->input('provincia') != null ? $request->input('provincia') : "N/D",
                    'municipio' => $request->input('municipio') != null ? $request->input('municipio') : "N/D",
                    'idPessoa'  => $idPessoa,     
                ]);
                if ($naturalidade) {
                    $endereco = Endereco::create([
                        'idPessoa' => $idPessoa,
                        'provincia' => $request->input('provinciaEndereco'),
                        'municipio' => $request->input('municipioEndereco'),
                        'bairro' => $request->input('bairro') != null ? ucwords(strtolower($request->input('bairro'))) : "N/D",
                        'zona' => $request->input('bairro') != null ? ucwords(strtolower($request->input('zona'))) : "N/D",
                        'quarteirao' => $request->input('bairro') != null ? ucwords(strtolower($request->input('quarteirao'))) : "N/D",
                        'rua' => $request->input('bairro') != null ? ucwords(strtolower($request->input('rua'))) : "N/D",
                        'casa' => $request->input('bairro') != null ? ucwords(strtolower($request->input('casa'))) : "N/D",
                    ]);
                    if ($endereco) {
                        if ($request->input('cadastrar') == 'cadastrarPessoa') {
                            return redirect()->back()->with('success','Pessoa Cadastrada com Sucesso!');
                        }else {
                            // 
                            return redirect()->route('funcionarios.verificarPessoa.funcionario', ['numeroBI' => $request->input('numeroBI')])->with('success', 'Pessoa Cadastrada com Sucesso!');
                        }
                    }else {
                        return redirect()->back()->with('error','Erro ao Adicionar Endereço');

                    }
                }else {
                    return redirect()->back()->with('error','Erro ao Adicionar Naturalidade');

                }
             }else {
                return redirect()->back()->with('error','Erro ao Adicionar Parentesco');
            }
        }else {
            return redirect()->back()->with('error','Erro ao Cadastrar Pessoa');
        }
    }

    //Create
    public function update(Request $request, string $id)
    { 
	
        $request->validate([
            'nomeCompleto' => ['string', 'max:255','required'],
            'dataNascimento' => ['date','required','before:' .now()->subYears(18)->format('Y-m-d')],
            'genero'=> ['string', 'max:9','required'],
            //'grupoSanguineo' => ['string','max:3'],
            'estadoCivil' => ['string'],
            'numeroBI' => ['required', 'string', 'max:14', 'unique:pessoas,numeroBI,'.$id],
            'validadeBI' => ['date','required','after_or_equal:'.now()],
            'provincia' => ['string', 'max:255','required'],
            'municipio' => ['string', 'max:255','required'],
            'nomePai' => ['string', 'max:255','required'],
            'nomeMae' => ['string', 'max:255','required'],
            'idPessoa' => ['integer'],
        ], [
                'dataNascimento.required' => 'Data de Nascimento é um campo obrigatorio!',
                'dataNascimento.before' => 'Registro só é valido para maiors de 18 anos de idade!',
                'nomeCompleto.required' => 'O campo Nome Completo é Obrigatório!',
                'numeroBI.required' => 'O número de Bilhete de Identidade é Obrigatório!',
                'numeroBI.unique' => 'O número de BI inserido ja está sendo utilizado por outro usuário!',
                'validadeBI.required' => 'Data de Validade BI é um campo obrigatoria!',
                'validadeBI.after_or_equal' => 'Bilhete de Identidade com data de validade expirada!',
                'nomePai.required' => 'Insira o nome do Pai!',
                'nomeMae.required' => 'Insira o nome da Mãe!',
            ]);

    $pessoa = Pessoa::find($id);
        // Encontre o registro a ser actualizado em Parentes com base na chave estrangeira
    $parentes = Parente::where('idPessoa', $id)->first();
    // Encontre o registro em Naturalidade com base na chave estrangeira
    $naturalidades = Naturalidade::where('idPessoa', $id)->first();
    // Atualize os campos do pesso$pessoa com os dados do formulário
            $pessoa->nomeCompleto = ucwords(strtolower($request->nomeCompleto));
            $pessoa->dataNascimento = $request->dataNascimento;
            $pessoa->genero = $request->genero;
            $pessoa->grupoSanguineo = $request->grupoSanguineo === null ? "N/D" : $request->grupoSanguineo;
            $pessoa->estadoCivil = $request->estadoCivil;
            $pessoa->numeroBI = mb_strtoupper($request->numeroBI);
            $pessoa->validadeBI = $request->validadeBI;
            $naturalidades->provincia = $request->provincia;
            $naturalidades->municipio = $request->municipio;
            $parentes->nomePai = ucwords(strtolower($request->nomePai));
            $parentes->nomeMae = ucwords(strtolower($request->nomeMae));
    // iniciando a transacao para as alterações no registro
    DB::beginTransaction();
    if ($pessoa->save()) {
        if ($naturalidades->save()) {
            if ($parentes->save()) {
                DB::commit();
                // Redirecionando para a Pagina de Index Funionarios
                return redirect()->back()->with('success', 'Registro atualizado com sucesso.');
            }else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Erro de actualização na tabela parentes! ')->withInput();
            }
        }else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro de actualização na tabela naturalidade! ')->withInput();
        }
    }else {
        DB::rollBack();
        return redirect()->back()->with('error', 'Erro de actualização na tabela pessoa! ')->withInput();
    }
   
    }
}
