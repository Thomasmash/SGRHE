<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule. //23121997 
     */
    protected function schedule(Schedule $schedule): void
    {
		
		if(Storage::disk('agenda_backup')->exists('agendamendo.json')){
			$agendamentoConfig = json_decode(Storage::disk('agenda_backup')->get('agendamendo.json'), true);
			//Ajustes de Fuso Horario UTC para Africa/Luanda
			// Obtém a hora da requisição
			$hora = $agendamentoConfig['hora'];

			// Converte a hora recebida para um objeto Carbon
			$horaCarbon = Carbon::parse($hora);

			// Recuar uma hora
			$horaRecuada = $horaCarbon->subHour();

			// Se você quiser formatar a hora de volta para string
			$horaRecuadaFormatada = $horaRecuada->format('H:i');
	
			switch($agendamentoConfig['frequency']){
				case 'Minuto':
				$schedule->command('backup:run')->everyMinute();
				break;
				case 'Hora':
				$schedule->command('backup:run')->hourly();
				break;
				case 'Diario':
				$schedule->command('backup:run')->daily()->at($horaRecuadaFormatada);
				break;
				case 'Semanalmente':
				$schedule->command('backup:run')->weeklyOn($agendamentoConfig['diaSemana'], $horaRecuadaFormatada);
				break;
				case 'Mensal':
				$schedule->command('backup:run')->monthlyOn($agendamentoConfig['diaMes'], $horaRecuadaFormatada);
				break;
			}
		}
		
        // $schedule->command('inspire')->hourly();

		//$schedule->command('backup:run')->daily()->at('00:00');
		//$schedule->command('backup:run')->daily()->at('11:00');
   

    }

    /**
     * Register the commands for the application. //23121997 
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
