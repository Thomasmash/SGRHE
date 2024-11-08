<?php

namespace App\Console\Commands;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Spatie\Backup\Tasks\Monitor\BackupMonitor;
use Illuminate\Console\Command;

class ListBackups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-backups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    //protected $signature = 'backup:list';
    //protected $description = 'List all backups in a table';
    public function handle()
    {
        //
        $this->info('Listando todos os backups:');

        // Obter todos os backups
        $backups = BackupMonitor::create()->getBackups();

        // Definir cabeçalho da tabela
        $this->table(['Nome do Backup', 'Data', 'Tamanho'], $this->formatBackups($backups));
   
    }
     protected function formatBackups($backups)
    {
        return array_map(function ($backup) {
            return [
                'Nome do Backup' => $backup->name,
                'Data' => $backup->date->format('Y-m-d H:i:s'),
                'Tamanho' => $backup->size,
            ];
        }, $backups);
    }
}
