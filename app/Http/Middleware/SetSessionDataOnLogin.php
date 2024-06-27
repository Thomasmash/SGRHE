<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
      if (auth()->check() && !session()->has('DadosUsuarioLogado')) {
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
    return $next($request);
    }
}
