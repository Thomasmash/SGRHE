<?php

namespace App\Http\Middleware;

use App\Models\Arquivo;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Pessoa;
use App\Models\Seccao;
use App\Models\UnidadeOrganica;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetSessionDataOnLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      // Executar apenas no momento do login
      if ( auth()->check() && Funcionario::where('numeroAgente', Auth::user()->numeroAgente )->first()) {
		//  dd('Funcionario cadastrado');
        // Lógica para inserir dados na sessão
        //Carregar Dados iniciais 
        $numeroAgente = Auth::user()->numeroAgente;
        $funcionario = Funcionario::where('numeroAgente', $numeroAgente)->first();
        session(['FuncionarioLogado' => $funcionario]);
        session(['CargoLogado' => Cargo::find($funcionario->idCargo)->first()]);
        session(['SeccaoLogado' => Seccao::find($funcionario->idSeccao)->first()]);
        session(['PessoaLogado' =>  Pessoa::find($funcionario->idPessoa)->first()]);
        session(['UnidadeOrganicaLogado' => UnidadeOrganica::find($funcionario->idUnidadeOrganica)->first()]);
        session(['FotoPerfilLogado' => isset(Arquivo::where('idFuncionario', $funcionario->id)->where('categoria','FotoPerfil')->first()->caminho) ? Arquivo::where('idFuncionario',$funcionario->id)->where('categoria','FotoPerfil')->first()->caminho : "null"]);
    }
		//  dd('Funcionario nao cadastrado');
    return $next($request);
    }
}
