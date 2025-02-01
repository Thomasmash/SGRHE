<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        if (Storage::disk('agenda_backup')->exists('agendamendo.json')) {
            $agendamentoConfig = json_decode(Storage::disk('agenda_backup')->get('agendamendo.json'), true);

            /* Verifica se a decodificação do JSON foi bem-sucedida
            if (json_last_error() !== JSON_ERROR_NONE) {
                // Trate o erro de JSON aqui, se necessário
                \Log::error('Erro ao decodificar agendamendo.json: ' . json_last_error_msg());
                return;
            }

      
            if (!isset($agendamentoConfig['hora'], $agendamentoConfig['frequency'])) {
                \Log::error('Configuração de agendamento inválida: ' . json_encode($agendamentoConfig));
                return;
            } */

           
		   
		   
		   // Ajustes de Fuso Horário UTC para Africa/Luanda
			
           // $hora = $agendamentoConfig['hora'];
           // $horaCarbon = Carbon::parse($hora);
           // $horaRecuada = $horaCarbon->subHour();
           // $horaRecuadaFormatada = $horaRecuada->format('H:i');

            switch ($agendamentoConfig['frequency']) {
                case 'Minuto':
                    $schedule->command('backup:run')->everyMinute();
                    break;
                case 'Hora':
                    $schedule->command('backup:run')->hourly();
                    break;
                case 'Diario':
                    $schedule->command('backup:run')->daily()->at($agendamentoConfig['hora']);
                    break;
                case 'Semanalmente':
                    if (isset($agendamentoConfig['diaSemana'])) {
                        $schedule->command('backup:run')->weeklyOn($agendamentoConfig['diaSemana'], $agendamentoConfig['hora']);
                    }
                    break;
                case 'Mensal':
                    if (isset($agendamentoConfig['diaMes'])) {
                        $schedule->command('backup:run')->monthlyOn($agendamentoConfig['diaMes'], $agendamentoConfig['hora']);
                    }
                    break;
                default:
                    \Log::error('Frequência de agendamento inválida: ' . $agendamentoConfig['frequency']);
                    break;
            }
        } else {
            \Log::warning('Arquivo agendamendo.json não encontrado.');
        }
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