<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

use Exception;

class BackupController extends Controller
{
    //Funções 
	   public function agendar(Request $request){
		    // dd($request->all());
		    $frequency = $request->input('frequencia');
			$hora = $request->input('hora'); 
			Storage::disk('agenda_backup')->put('agendamendo.json', json_encode(['frequency' => $frequency,'hora' => $hora]));
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
				return redirect()->back()->with('success', 'Backup Feito com sucesso!');
				 }else{
					return redirect()->back()->with([
						'error' => "Erro ao Realizar o Backup!",
					]);
			 }
		}
		
		
		
		public function limparAgenda(){
			Storage::disk('agenda_backup')->put('agendamendo.json', json_encode(null));
			return redirect()->back()->with('success', 'Agenda de backup cancelada sucesso!');
		}
		
		
		
		
		
		
		 public function restaurar(Request $request)
    {
        try {
            // Verifica se o arquivo de backup existe
            $backupPath = storage_path('app/backup/SGRHE/'.$request->nomeBackup);

            if (!File::exists($backupPath)) {
                return redirect()->back()->withErrors(['message' => 'Backup não encontrado.']);
            }
            // Descompacta o arquivo ZIP
            $this->unzipBackup($backupPath);

            // Adicionar a lógica para restaurar o banco de dados, se necessário
             $this->restoreDatabase();

            return redirect()->back()->with('success', 'Restauração realizada com sucesso.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Erro ao restaurar o backup: ' . $e->getMessage()]);
        }
    }











    protected function unzipBackup($zipFilePath)
    {
        $zip = new ZipArchive;

        if ($zip->open($zipFilePath) === TRUE) {
            // Define o diretório de destino para descompactar
            $extractPath = storage_path('app/backups/extracted/');

            // Cria o diretório de extração se não existir
            if (!File::exists($extractPath)) {
                File::makeDirectory($extractPath, 0755, true);
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
    $sqlFilePath = storage_path('app/backups/extracted/db-dumps/mysql-sgrhe-1.sql'); // Altere para o nome correto do arquivo SQL

    if (File::exists($sqlFilePath)) {
        $command = sprintf('mysql -u %s -p%s %s < %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            $sqlFilePath
        );

        exec($command);
    } else {
        throw new Exception('Arquivo SQL não encontrado para restaurar o banco de dados.');
    }
}
	
	//Outros Metodos
}
