<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use App\Models\FormularioAproveitamento;
use App\Models\Aproveitamento;
use App\Models\Funcionario;
use App\Models\UnidadeOrganica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
 
    public function index(){
        //Verificar Se O Usuario tem Perfil concluido
     
        $agenteLogado = Auth::user()->numeroAgente;
        $agente =  Funcionario::where('numeroAgente',$agenteLogado)->exists();
        if ($agente) {
            $FUNCIONARIO = Funcionario::where('numeroAgente', $agenteLogado)->first();
            $PERMISSOES = Cargo::where('id', $FUNCIONARIO->idCargo)->first()->permissoes;
            if ($PERMISSOES === 'Admin' || $PERMISSOES >= 4) {
                     //Carregando os Dados do Dashboard
                $unidadesOrganicas = UnidadeOrganica::where('id', '!=', 1)->get();
                $funcionarios = Funcionario::where('id', '!=', 1)->get();
               
                //Determinar o Ano Lectivo sabendo que Ele comeca sempre em setembro
                $dataActual = now();
                if ($dataActual->format('n') > 9) {
                    $anoLectivo = $dataActual->format('Y').'/'.($dataActual->format('Y') + 1);
                }else {
                    $anoLectivo = ($dataActual->format('Y') - 1).'/'.$dataActual->format('Y');
                } 
                            //Trimestre I
                            $SubControlI = Aproveitamento::select('idUnidadeOrganica')->where('trimestre', 'I')->where('anoLectivo', $anoLectivo)->groupBy('idUnidadeOrganica')->get();
                            $SubControlNonIs = UnidadeOrganica::whereNotIn('id', $SubControlI)->where('id', '!=', 1)->get();
                            $SubControlInIs = UnidadeOrganica::whereIn('id', $SubControlI)->where('id', '!=', 1)->get();
                            
                            
                            //Trimestre II
                            $SubControlII = Aproveitamento::select('idUnidadeOrganica')->where('trimestre', 'II')->where('anoLectivo', $anoLectivo)->groupBy('idUnidadeOrganica')->get();
                            $SubControlNonIIs = UnidadeOrganica::whereNotIn('id', $SubControlII)->where('id', '!=', 1)->get();
                            $SubControlInIIs = UnidadeOrganica::whereIn('id', $SubControlII)->where('id', '!=', 1)->get();
                            
                            //Trimestre III
                            $SubControlIII = Aproveitamento::select('idUnidadeOrganica')->where('trimestre', 'III')->where('anoLectivo', $anoLectivo)->groupBy('idUnidadeOrganica')->get();
                            $SubControlNonIIIs = UnidadeOrganica::whereNotIn('id', $SubControlIII)->where('id', '!=', 1)->get();
                            $SubControlInIIIs = UnidadeOrganica::whereIn('id', $SubControlIII)->where('id', '!=', 1)->get();
                            
                            //Trimestre Final
                            $SubControlFinal = Aproveitamento::select('idUnidadeOrganica')->where('trimestre', 'Final')->where('anoLectivo', $anoLectivo)->groupBy('idUnidadeOrganica')->get();
                            $SubControlNonFinals = UnidadeOrganica::whereNotIn('id', $SubControlFinal)->where('id', '!=', 1)->get();
                            $SubControlInFinals = UnidadeOrganica::whereIn('id', $SubControlFinal)->where('id', '!=', 1)->get();

                            $aproveitamentosI = Aproveitamento::where('trimestre', 'I')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
                            $aproveitamentosII = Aproveitamento::where('trimestre', 'II')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
                            $aproveitamentosIII = Aproveitamento::where('trimestre', 'III')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
                            $aproveitamentosFinal = Aproveitamento::where('trimestre', 'Final')->where('anoLectivo', $anoLectivo)->orderBy('classe', 'desc')->get();
                            
                        
                return view('/dashboard',compact('anoLectivo','aproveitamentosI','aproveitamentosII','aproveitamentosIII','aproveitamentosFinal','SubControlInIs','SubControlNonIs','SubControlInIIs','SubControlNonIIs','SubControlInIIIs','SubControlNonIIIs','SubControlInFinals','SubControlNonFinals','unidadesOrganicas','funcionarios'));
            }else{
                //Redirecionando para a routa de Dashboard Escola se For director de escola ou tecnico da Escola
                if ($PERMISSOES === 'Admin' || $PERMISSOES >= 2){
                    //Redirecionanado para a Linha de Tempo Pessoal
                    $idUO = $FUNCIONARIO->idUnidadeOrganica;
                    return redirect()->route('dashboard.unidade.organica.how', ['idUnidadeOrganica' => "$idUO"]);
                }else{
                    //Redirecionar o funcionario comum para a sua Timeline
                    $idF = $FUNCIONARIO->id;
                    return redirect()->route('timeline.show', ['idFuncionario' => "$idF"]);
                }
            }
      
        }else{
        header('Location:/?error');
        exit();
        } 
    }
}
