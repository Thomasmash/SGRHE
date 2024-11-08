<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
		if(Storage::disk('local')->exists('agendamendo.json')){
			$agendamentoConfig = json_decode(Storage::disk('local')->get('agendamendo.json'), true);
			switch($agendamentoConfig['frequency']){
				case 'Minuto':
				$schedule->command('backup:run')->everyMinute();
				break;
				case 'Hora':
				$schedule->command('backup:run')->hourly();
				break;
				case 'Diário':
				$schedule->command('backup:run')->daily()->at($agendamentoConfig['hora']);
				break;
				case 'Semanal':
				$schedule->command('backup:run')->weekly()->at($agendamentoConfig['hora']);
				break;
				case 'Mensal':
				$schedule->command('backup:run')->monthly()->at($agendamentoConfig['hora']);
				break;
			}
		}
		
        // $schedule->command('inspire')->hourly();

		//$schedule->command('backup:run')->daily()->at('00:00');
		//$schedule->command('backup:run')->daily()->at('11:00');
   

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
