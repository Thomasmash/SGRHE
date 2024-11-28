<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Spatie\Backup\Tasks\Monitor\BackupMonitor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class ConfigSistemaController extends Controller
{
   public function opcoesDoSistema()
    {
		// Definindo o Directorio de backup
        $directoryPath = storage_path('app/backup/SGRHE'); 
		
		if (!is_dir($directoryPath)) {
			//Apricar um backup aut inicial de criacao de directorio  de dados
			$exitCode = Artisan::call('backup:run');
			 if ($exitCode === 0) {
				//  dd('Backup Inicial feito com sucesso');
				 }else{
				//	dd('Ero ao criar o backup');
			 }
		} else {
			// dd('Direcorio já existe');
		}
		
		 // Obtenha todos os arquivos do diretório
        $files = File::files($directoryPath);
	
        // Crie um array para armazenar os dados dos arquivos
        $backups = [];

        foreach ($files as $file) {
            $backups[] = [
                'name' => $file->getFilename(),
                'created_at' => $file->getCTime(), // Data de criação em timestamp
                'size' => $file->getSize(), // Tamanho do arquivo
            ];
        }
		$agendamento = json_decode(Storage::disk('agenda_backup')->get('agendamendo.json'), true);
		//dd($agendamento);
		return view('sgrhe/sistema-config', compact('backups', 'agendamento'));
    }
}
