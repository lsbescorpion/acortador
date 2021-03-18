<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\VisitasDiariasUrl;
use App\Models\CPM;
use App\Models\GananciasDiarias;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $fecha = Carbon::now()->setTimezone('America/Havana')->toDateTimeString();
            $visitas = VisitasDiariasUrl::whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->get();
            $cpm = CPM::find(1);
            for($i = 0; $i < count($visitas); $i++) {
                $ga = round(($visitas[$i]->visitas*$cpm->cpm)/1000, 2, PHP_ROUND_HALF_DOWN);
                if($ga > 0 ) {
                    $ganancias = GananciasDiarias::where(['user_id' => $visitas[$i]->user_id, 'url_id' => $visitas[$i]->url_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
                    $ganancias = ($ganancias != null ? $ganancias : new GananciasDiarias());
                    $ganancias->fecha = date('Y-m-d',strtotime($fecha));
                    $ganancias->user_id = $visitas[$i]->user_id;
                    $ganancias->url_id = $visitas[$i]->url_id;
                    $ganancias->ganancia = round(($visitas[$i]->visitas*$cpm->cpm)/1000, 2, PHP_ROUND_HALF_DOWN);
                    $ganancias->save();
                }
            }
        })
        ->everyMinute()
        ->runInBackground();
        //everyTwoMinutes()
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
