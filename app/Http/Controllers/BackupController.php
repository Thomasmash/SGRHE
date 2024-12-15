<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;

use Exception;

class BackupController extends Controller
{
    //Funções 
	   public function agendar(Request $request){
		    //dd($request->all());
		    $frequency = $request->input('frequencia');
			$hora = $request->input('hora'); 
			$diaSemana = $request->input('dia-semana'); 
			$diaMes = $request->input('dia-mes'); 
			Storage::disk('agenda_backup')->put('agendamendo.json', json_encode(['frequency' => $frequency,'diaMes' => $diaMes,'diaSemana' => $diaSemana,'hora' => $hora]));
			return redirect()->back()->with('success', 'Backup agendado com sucesso!');
	   }	   
	   
	   public function eliminar(Request $request){
			//diretório onde os arquivos estão armazenados
		    $caminho = storage_path('app/backup/SGRHE'); 
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
				 sleep(5);
				return response()->json(['message' => 'Backup Feito com sucesso']);
				 }else{
					return response()->json(['message' => 'Erro ao realizar o Backup' ]);
			 }
		}
		
		
		
		public function limparAgenda(){
			Storage::disk('agenda_backup')->put('agendamendo.json', json_encode(null));
			return redirect()->back()->with('success', 'Agenda de backup cancelada sucesso!');
		}
		
		
		
		
		
		
	public function restaurar(Request $request)
{
    try {
        // Validação do nome do arquivo
        $request->validate([
            'nomeBackup' => 'required|string',
        ]);

        // Verifica se o arquivo de backup existe
        $backupPath = storage_path('app/backup/SGRHE/'.$request->nomeBackup);
        if (!File::exists($backupPath)) {
            return redirect()->back()->withErrors(['message' => 'Backup não encontrado.']);
        }

        // Descompacta o arquivo ZIP
        $this->unzipBackup($backupPath);

        // Restaura o banco de dados
        $this->restoreDatabase();

        // Restaura os arquivos
        $this->restoreFiles();
		return response()->json(['message' => "O Backup ".$request->nomeBackup." foi restaurado com sucesso. Acutualize a página para continuar!"], 200);
        //return redirect()->back()->with('success', 'Restauração realizada com sucesso.');
    } catch (Exception $e) {
        // Captura e exibe a mensagem de erro
        return redirect()->back()->withErrors(['message' => 'Erro ao restaurar o backup: ' . $e->getMessage()]);
    }
}

protected function unzipBackup($zipFilePath)
{
    $zip = new ZipArchive;
    if ($zip->open($zipFilePath) === TRUE) {
        $extractPath = storage_path('app/backup/extracted/');
        
        // Cria o diretório de extração se não existir
        if (!File::exists($extractPath)) {
            File::makeDirectory($extractPath, 777, true);
        }

        // Extrai o conteúdo do ZIP
        $zip->extractTo($extractPath);
        $zip->close();
    } else {
        throw new Exception('Não foi possível abrir o arquivo ZIP.');
    }
}

protected function restoreDatabase()
{
    // Caminho do arquivo SQL de backup
    $sqlFilePath = storage_path('app/backup/extracted/db-dumps/mysql-sgrhe-1.sql');

    if (File::exists($sqlFilePath)) {
        // Utilizando DB Facade para executar a restauração
        try {
            // Alternativa mais segura ao exec() - Laravel DB Facade
            DB::unprepared(file_get_contents($sqlFilePath));
        } catch (\Exception $e) {
            throw new Exception('Erro ao restaurar o banco de dados: ' . $e->getMessage());
        }
    } else {
        throw new Exception('Arquivo SQL não encontrado para restaurar o banco de dados.');
    }
}

protected function restoreFiles()
{
    // Diretórios de origem e destino
    $sourceDir = storage_path('app/backup/extracted/var/www/SGRHE/storage/app/sgrhe');
    $destinationDir = storage_path('app/sgrhe');

    // Verifica se o diretório de origem existe
    if (File::exists($sourceDir)) {

        // Verifica se o diretório de destino existe
        if (File::exists($destinationDir)) {
            // Apaga o diretório de destino e todo seu conteúdo
            File::deleteDirectory($destinationDir);
        }

        // Copia os arquivos do diretório de origem para o diretório de destino
        try {
            // Usando copyDirectory para copiar todo o conteúdo do diretório de origem para o destino
	

            //dd($sourceDir.$destinationDir);

            File::moveDirectory($sourceDir, $destinationDir);
			//return redirect()->back()->with('success', 'Restauração realizada com sucesso.'); //231297
        } catch (Exception $e) {
            // Se houver algum erro ao copiar os arquivos, lança uma exceção com a mensagem de erro
            throw new Exception('Erro ao restaurar os arquivos: ' . $e->getMessage());
        }

    } else {
        // Se o diretório de origem não existir, lança uma exceção com a mensagem de erro
        throw new Exception('Diretório de arquivos não encontrado para restaurar.');
    }
}
	//Outros Metodos
}
