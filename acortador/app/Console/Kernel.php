<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\VisitasDiariasUrl;
use App\Models\CPM;
use App\Models\GananciasDiarias;
use App\Models\GananciasDiariasAdsense;
use App\Models\GananciasMensuales;
use App\Models\GananciasMensualesAdsense;
use Carbon\Carbon;
use Analytics;
use Spatie\Analytics\Period;
use App\Models\Urls;

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
        $schedule->call(function () {
            $startDate = Carbon::now()->setTimezone('America/Havana');//Carbon::createFromFormat('d/m/Y', '20/08/2019');
            $endDate = Carbon::now()->setTimezone('America/Havana');//Carbon::createFromFormat('d/m/Y', '20/08/2019');//Carbon::now();
            $fecha = Carbon::now()->setTimezone('America/Havana')->toDateTimeString();
            $analyticsData = Analytics::performQuery(
                Period::create($startDate, $endDate),
                'ga:pagePath',
                [
                    'metrics' => 'ga:adsenseRevenue,ga:adsenseAdsClicks,ga:adsenseCTR,ga:adsenseCoverage',
                    'dimensions' => 'ga:pagePath,ga:source',
                    'filters' => 'ga:pagePath=@publica;ga:source=@facebook'
                ]
            );
            $rows = $analyticsData->rows;
            if($rows != null && count($rows) > 0) {
                for($i = 0; $i < count($rows); $i++) {
                    if(strpos($rows[$i][1], 'direct') === false) {
                        $url = explode("/", $rows[$i][0]);
                        $id = explode("?", $url[3]);
                        if($rows[$i][2] != '0.0' && is_numeric($rows[$i][2]) && $rows[$i][2] >= 0.01) {
                            $ur = Urls::with(['users'])->where(['url_acortada' => $id[0]])->first();
                            if($ur != null) {
                                $ganancias = GananciasDiariasAdsense::where(['user_id' => $ur->users->id, 'url_id' => $ur->id, 'url' => $rows[$i][0], 'referr' => $rows[$i][1]])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
                                $ganancias = ($ganancias != null ? $ganancias : new GananciasDiariasAdsense());
                                $ganancias->fecha = date('Y-m-d',strtotime($fecha));
                                $ganancias->user_id = $ur->users->id;
                                $ganancias->url_id = $ur->id;
                                $ganancias->ganancia = round($rows[$i][2], 2, PHP_ROUND_HALF_DOWN);
                                $ganancias->url = $rows[$i][0];
                                $ganancias->referr = $rows[$i][1];
                                $ganancias->save();
                            }
                        }
                    }
                }
            }
        })
        ->everyThirtyMinutes()
        ->runInBackground();
        //everyTwoMinutes()
        $schedule->call(function () {
            $mes = date("m",strtotime("-1 month"));
            $anno = date("Y",strtotime("-1 month"));
            $start = date("Y-m-1 H:i:s",strtotime("-1 month"));  
            $end = date("Y-m-t H:i:s",strtotime("-1 month"));
            $gmensual = GananciasDiarias::groupBy('user_id')->selectRaw('user_id, sum(ganancia) as sum')->whereBetween('fecha', [$start, $end])->get();
            for($i = 0; $i < count($gmensual); $i++) {
                $mensual = GananciasMensuales::where(['user_id' => $gmensual[$i]->user_id, 'mes' => $mes, 'anno' => $anno])->first();
                $mensual = ($mensual != null ? $mensual : new GananciasMensuales());
                $mensual->mes = $mes;
                $mensual->anno = $anno;
                $mensual->pagado = 0;
                $mensual->user_id = $gmensual[$i]->user_id;
                $mensual->ganancia = round($gmensual[$i]->sum, 2, PHP_ROUND_HALF_DOWN);
                $mensual->save();
            }
        })
        ->monthlyOn(1, '02:00')
        ->runInBackground();
        $schedule->call(function () {
            $mes = date("m",strtotime("-1 month"));
            $anno = date("Y",strtotime("-1 month"));
            $start = date("Y-m-1 H:i:s",strtotime("-1 month"));  
            $end = date("Y-m-t H:i:s",strtotime("-1 month"));
            $gmensual = GananciasDiariasAdsense::groupBy('user_id')->selectRaw('user_id, sum(ganancia) as sum')->whereBetween('fecha', [$start, $end])->get();
            for($i = 0; $i < count($gmensual); $i++) {
                $mensual = GananciasMensualesAdsense::where(['user_id' => $gmensual[$i]->user_id, 'mes' => $mes, 'anno' => $anno])->first();
                $mensual = ($mensual != null ? $mensual : new GananciasMensualesAdsense());
                $mensual->mes = $mes;
                $mensual->anno = $anno;
                $mensual->pagado = 0;
                $mensual->user_id = $gmensual[$i]->user_id;
                $mensual->ganancia = round($gmensual[$i]->sum, 2, PHP_ROUND_HALF_DOWN);
                $mensual->save();
            }
        })
        ->monthlyOn(1, '03:00')
        ->runInBackground();
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
