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
            //dd(Auth::check());
            $numeroAgente = Auth::user()->numeroAgente;
            $funcionario = Funcionario::where('numeroAgente', $numeroAgente)->first();
            //dd($funcionario);
            session(['funcionario' => $funcionario]);
            session(['funcionario' => $funcionario]);
            session(['Cargo' => Cargo::find($funcionario->idCargo)->first()]);
            session(['Seccao' => Seccao::find($funcionario->idSeccao)->first()]);
            session(['Pessoa' =>  Pessoa::find($funcionario->idPessoa)->first()]);
            session(['unidadeOrganica' => UnidadeOrganica::find($funcionario->idUnidadeOrganica)->first()]);
            //
            //
            session(['fotoPerfil' => isset(Arquivo::where('idFuncionario', $funcionario->id)->where('categoria','FotoPerfil')->first()->caminho) ? Arquivo::where('idFuncionario',$funcionario->id)->where('categoria','FotoPerfil')->first()->caminho : "null"]);
            // dd(session()->only(['fotoPerfil'])['fotoPerfil']);
            session(['idUnidadeOrganica' => UnidadeOrganica::where('id', Funcionario::where('id', $funcionario->id)->first()->idUnidadeOrganica)->first()->id]);
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
        //return redirect()->route('login');
        return $next($request);
    }
}

