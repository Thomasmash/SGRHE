<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoDesempenhoFuncionario;
use App\Models\Cargo;
use App\Models\Pessoa;
use App\Models\Funcionario;
use App\Models\Documento;
use App\Models\Arquivo;
use App\Models\UnidadeOrganica;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class ObjectController extends Controller
{
    //
    
    public function actualizar(Request $request) {
    }



    public function eliminar(Request $request) {
        //Sem validacoes
       switch($request->input('categoria')){
        case 'Cargo':
            $item = Cargo::findOrFail($request->input('id'));
            try {
                $item->delete();
                return redirect()->back()->with('success', 'Cargo excluída com sucesso!');
            } catch (QueryException $e) {
                Log::error('Erro na Transação:'.$e->getMessage());
                return redirect()->back()->with('aviso', 'Não é possível eliminar a Cargo');
            }
            return redirect()->back()->with('success', 'Cargo excluída com sucesso!');
            break;
        case 'Pessoa':
			$Funcionario = Funcionario::where("idPessoa", $request->input('id'))->first();
            $item = Pessoa::findOrFail($request->input('id'));
		    if($Funcionario==null)
			{
				$item->delete();
				return redirect()->back()->with('success', 'Pessoa excluída com sucesso!');
			}else{
					 try {
					$item->delete();
					$destinationDir = storage_path('app/sgrhe/funcionarios/'.$Funcionario->id);
					File::deleteDirectory($destinationDir);
					return redirect()->back()->with('success', 'Funcionario e seus dados excluídos com sucesso!');
				} catch (QueryException $e) {
					Log::error('Erro na Transação:'.$e->getMessage());
					return redirect()->back()->with('aviso', 'Não é possível eliminar a entidade');
				}
			}
           
            break;
        case 'UnidadeOrganica':
            $item = UnidadeOrganica::findOrFail($request->input('id'));
            try {
                $item->delete();
                return redirect()->back()->with('success', 'Unidade Orgânica excluída com sucesso!');
            } catch (QueryException $e) {
                Log::error('Erro na Transação:'.$e->getMessage());
                return redirect()->back()->with('aviso', 'Não é possível eliminar a Unidade Orgânica');
            }
            return redirect()->back()->with('success', 'Unidade Orgânica excluída com sucesso!');
            break;
        case 'Funcionario':
            $item = Funcionario::findOrFail($request->input('id'));
           			 try {
					$item->delete();
					$destinationDir = storage_path('app/sgrhe/funcionarios/'.$item->id);
					File::deleteDirectory($destinationDir);
					return redirect()->back()->with('success', 'Funcionario e seus dados excluídos com sucesso!');
				} catch (QueryException $e) {
					Log::error('Erro na Transação:'.$e->getMessage());
					return redirect()->back()->with('aviso', 'Não é possível eliminar a entidade');
				}
            return redirect()->back()->with('success', 'Funcionário excluído com sucesso!');
            break;
        case 'AvaliacaoFuncionario':
            $item = AvaliacaoDesempenhoFuncionario::findOrFail($request->input('id'));
            $item->delete();
            return redirect()->back()->with('success', 'Avaliação excluída com sucesso!');
            break;
        default:
        return redirect()->back()->with('erro', 'Não é possivel excluir!');
        break;
       }
       
       
    }
 

}
