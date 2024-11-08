<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

class BackupController extends Controller
{
    //Funções 
	   public function agendar(Request $request){
		    // dd($request->all());
		    $frequency = $request->input('frequencia');
			$hora = $request->input('hora'); 
			Storage::disk('local')->put('agendamendo.json', json_encode(['frequency' => $frequency,'hora' => $hora]));
			return redirect()->back()->with('success', 'Backup agendado com sucesso!');
	   }
	   
	   
	   public function eliminar(Request $request){
			//diretório onde os arquivos estão armazenados
		    $caminho = storage_path('app/sgrhe/SGRHE'); 
			// Caminho do Arquivo Completo
			$filePath = $caminho . '/' . $request->nome;

			 // Verifique se o arquivo existe
			if (File::exists($filePath)) {
				// Delete o arquivo
				File::delete($filePath);
				return redirect()->back()->with('success', 'Backup deletado com sucesso!');
			} else {
				return redirect()->back()->with('error', 'Backup não encontrado.');
			}
		}
	
		public function criar(){
			// Executa o comando Artisan para backup
			$exitCode = Artisan::call('backup:run');
			
			$output = trim(Artisan::output()); // Menssagens de Retorno do Artisan
			
			 if ($exitCode === 0) {
				return redirect()->back()->with('success', 'Backup Feito com sucesso!');
				 }else{
					return redirect()->back()->with([
						'error' => "Erro ao Realizar o Backup!",
					]);
			 }
		}
		
		public function limparAgenda(){
			Storage::disk('local')->put('agendamendo.json', json_encode(null));
			return redirect()->back()->with('success', 'Agenda de backup cancelada sucesso!');
		}
	
	//Outros Metodos
}
