<?php

namespace App\Http\Middleware;

use App\Models\Arquivo;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Pessoa;
use App\Models\Seccao;
use App\Models\UnidadeOrganica;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
//Dados

class DadosUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Se o Funcionário estiver Logado e Registrado  //23121997
        if (Auth::check() && Funcionario::where('numeroAgente', Auth::user()->numeroAgente )->first() ) {
			
                //Organizar dados de Funcionamento do Funcionário
				$funcionario = Funcionario::where('numeroAgente', Auth::user()->numeroAgente)->first();
				//Dados de Sessao, os quais serao usados em Controllers
				session(['FuncionarioLogado' => $funcionario]);
				session(['CargoLogado' => Cargo::find($funcionario->idCargo)->first()]);
				session(['SeccaoLogado' => Seccao::find($funcionario->idSeccao)->first()]);
				session(['PessoaLogado' =>  Pessoa::find($funcionario->idPessoa)->first()]);
				session(['UnidadeOrganicaLogado' => UnidadeOrganica::find($funcionario->idUnidadeOrganica)->first()]);
				session(['FotoPerfilLogado' => isset(Arquivo::where('idFuncionario', $funcionario->id)->where('categoria','FotoPerfil')->first()->caminho) ? Arquivo::where('idFuncionario',$funcionario->id)->where('categoria','FotoPerfil')->first()->caminho : "null"]);
				
				//Dados que serao usados na proxima pagina
                view()->share([
                    'funcionarioLogado' => $funcionario,
                    'pessoaLogado' => Pessoa::where('id', $funcionario->idPessoa )->first(),
                    'cargoLogado' => Cargo::where('id', $funcionario->idCargo )->first(),
                    'seccaoLogado' => Seccao::where('id', $funcionario->idSeccao )->first(),
                    'unidadeOrganicaLogado' => UnidadeOrganica::where('id', $funcionario->idUnidadeOrganica )->first(),
                    'numeroAgente' => $funcionario->numeroAgente,
                ]);
                return $next($request);
           
        }
       //Se o funcionario nao estiver logado //23121997
        return $next($request);
    }
}

