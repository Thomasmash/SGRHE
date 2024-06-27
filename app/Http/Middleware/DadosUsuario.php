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
        
        if (Auth::check()) {
            //Se o Funcionário estiver Logado, Organizar dados de Funcionamento
            //Carregando dados primários do Funcionário
            $numeroAgente = Auth::user()->numeroAgente;
            $funcionario = Funcionario::where('numeroAgente', $numeroAgente)->first(); 
            if (!($funcionario == null) ) { 
                //Organizar dados de Funcionamento do Funcionário
                view()->share([
                    'funcionarioLogado' => $funcionario,
                    'pessoaLogado' => Pessoa::where('id', $funcionario->idPessoa )->first(),
                    'cargoLogado' => Cargo::where('id', $funcionario->idCargo )->first(),
                    'seccaoLogado' => Seccao::where('id', $funcionario->idSeccao )->first(),
                    'unidadeOrganicaLogado' => UnidadeOrganica::where('id', $funcionario->idUnidadeOrganica )->first(),
                    'numeroAgente' => $numeroAgente,
                ]);
                return $next($request);
            }
            return $next($request);
        }
       // dd('funcionario nao existe');
        //Se Funcionario nao Logado
        return $next($request);
    }
}

