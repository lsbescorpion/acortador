<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Urls;
use App\Models\Categoria;
use App\Models\VisitasDiarias;
use App\Models\VisitasDiariasUrl;
use App\Models\GananciasDiarias;
use App\Models\GananciasMensuales;
use App\Models\Paises;
use App\Models\UrlVisitasP;
use App\Models\UrlVisitaR;
use App\Models\CPM;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Analytics;
use Spatie\Analytics\Period;

class UrlsController extends Controller
{

    public function getAnalytic() {
        /*$startDate = Carbon::now()->setTimezone('America/Havana');//Carbon::createFromFormat('d/m/Y', '20/08/2019');
        $endDate = Carbon::now()->setTimezone('America/Havana');//Carbon::createFromFormat('d/m/Y', '20/08/2019');//Carbon::now();*/
        $fecha = Carbon::now()->setTimezone('America/Havana')->toDateTimeString();

        /*$analyticsData = Analytics::performQuery(
            Period::create($startDate, $endDate),
            'ga:pagePath',
            [
                'metrics' => 'ga:adsenseRevenue,ga:adsenseAdsClicks,ga:adsenseCTR,ga:adsenseCoverage',
                'dimensions' => 'ga:pagePath,ga:source'
            ]
        );*/

        /*$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://free.currconv.com/api/v7/convert?q=USD_UYU&compact=y&apiKey=abbb5bcd94ffcb4df7ca');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $data = curl_exec($ch); 
        curl_close($ch);
        $rates = json_decode($data, true);

        $uyu = $rates['USD_UYU']['val'];*/

        //$rows = $analyticsData->rows;
        /*for($i = 0; $i < count($rows); $i++) {
            if($rows[$i][1] != '(direct)') {
                $url = explode("/", $rows[$i][0]);
                if(isset($url[3]) && strlen($url[3]) == 7) {
                    if($rows[$i][2] != '0.0' && is_numeric($rows[$i][2])) {
                        $ur = Urls::with(['users'])->where(['url_acortada' => $url[3]])->first();
                        if($ur != null) {
                            $ganancias = GananciasDiarias::where(['user_id' => $ur->users->id, 'url_id' => $ur->id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
                            $ganancias = ($ganancias != null ? $ganancias : new GananciasDiarias());
                            $ganancias->fecha = date('Y-m-d',strtotime($fecha));
                            $ganancias->user_id = $ur->users->id;
                            $ganancias->url_id = $ur->id;
                            if($uyu != null) {
                                $gan = $rows[$i][2] * $uyu;
                                $ganancias->ganancia = round($gan, 2, PHP_ROUND_HALF_DOWN);
                            }
                            else
                                $ganancias->ganancia = round($rows[$i][2]/0.0367, 2, PHP_ROUND_HALF_DOWN);
                            $ganancias->ganancia = round($rows[$i][2], 2, PHP_ROUND_HALF_DOWN);
                            $ganancias->save();
                        }
                    }
                }
            }
        }*/
        $visitas = VisitasDiariasUrl::whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->get();
        $cpm = CPM::find(1);
        for($i = 0; $i < count($visitas); $i++) {
            $ganancias = GananciasDiarias::where(['user_id' => $visitas[$i]->user_id, 'url_id' => $visitas[$i]->url_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
            $ganancias = ($ganancias != null ? $ganancias : new GananciasDiarias());
            $ganancias->fecha = date('Y-m-d',strtotime($fecha));
            $ganancias->user_id = $visitas[$i]->user_id;
            $ganancias->url_id = $visitas[$i]->url_id;
            $ganancias->ganancia = round($visitas[$i]->visitas/$cpm->cpm, 2, PHP_ROUND_HALF_DOWN);
            $ganancias->save();
        }
        return response()->json("Update data");
        //return response()->json($analyticsData);
    }

    public function CheckUrl($id) {
        $agent = new Agent();
        $url = Urls::with(['categoria','ganancias'])->where(['url_acortada' => $id, 'activa' => 1])->first();

        if($url == null) {
            return response()->json('Url no encontrada', 404);
        }

        $redirect = 0;
        if($agent->isRobot()) {
            $redirect = 1;
            $url->check = $redirect;
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        $ips = \Location::get();
        if($ips == null || $ips->countryCode == 'CU') {
            $redirect = 1;
            $url->check = $redirect;
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        $url->check = $redirect;

        return response()->json(base64_encode(json_encode($url)));
    }
 
    public function getUrl($id, Request $request)
    {
        $agent = new Agent();
        $url = Urls::with(['categoria','ganancias'])->where(['url_acortada' => $id, 'activa' => 1])->first();

        if($url == null) {
            return response()->json('Url no encontrada', 404);
        }

        $refer = base64_decode($request->get('r'));
        $pos = strpos($refer, 'facebook');
        /*if($pos === false) {
            if($refer != null) {
                $re = UrlVisitaR::where(['url_id' => $url->id, 'referr' => $refer])->first();

                if($re == null)
                    $re = new UrlVisitaR();

                $re->visitasr = ($re->visitasr != null ? $re->visitasr : 0) + 1;
                $re->url_id = $url->id;
                $re->referr = $refer;
                $re->save();
            }
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        if($request->get('user') != 'null') {
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        if(!$agent->isMobile() && !$agent->isTablet()) {
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        $redirect = 0;
        if($agent->isRobot()) {
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        $ips = \Location::get();
        if($ips == null || $ips->countryCode == 'CU') {
            return response()->json(base64_encode(json_encode($url)), 500);
        }

        $pais = Paises::where(['iso_a2' => $ips->countryCode])->first();

        $p = UrlVisitasP::where(['url_id' => $url->id, 'iso_2' => $ips->countryCode])->first();

        if($p == null)
            $p = new UrlVisitasP();

        $p->iso_2 = $ips->countryCode;
        $p->iso_3 = $pais->iso_a3;
        $p->visitasp = ($p->visitasp != null ? $p->visitasp : 0) + 1;
        $p->url_id = $url->id;
        $p->nombre = $pais->name_es;
        $p->save();

        $re = UrlVisitaR::where(['url_id' => $url->id, 'referr' => $refer])->first();

        if($re == null)
            $re = new UrlVisitaR();

        $re->visitasr = ($re->visitasr != null ? $re->visitasr : 0) + 1;
        $re->url_id = $url->id;
        $re->referr = $refer;
        $re->save();*/

        /*$url->visitas = $url->visitas + 1;
        $url->save();

        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');
        $visitas = VisitasDiarias::where(['user_id' => $url->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        if($visitas == null)
            $visitas = new VisitasDiarias();

        $visitas->visitas = ($visitas->visitas != null ? $visitas->visitas : 0) + 1;
        $visitas->fecha = $fecha;
        $visitas->user_id = $url->user_id;
        $visitas->save();*/

        return response()->json(base64_encode(json_encode($url)));
    }

    public function setVisitas($id, Request $request) {
        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');

        $url = Urls::where(['url_acortada' => $id, 'activa' => 1])->first();

        $url->visitas = $url->visitas + 1;
        $url->save();

        $visitas = VisitasDiarias::where(['user_id' => $url->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        if($visitas == null)
            $visitas = new VisitasDiarias();

        $visitas->visitas = ($visitas->visitas != null ? $visitas->visitas : 0) + 1;
        $visitas->fecha = $fecha;
        $visitas->user_id = $url->user_id;
        $visitas->save();

        $visitasu = VisitasDiariasUrl::where(['user_id' => $url->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        if($visitasu == null)
            $visitasu = new VisitasDiariasUrl();

        $visitasu->visitas = ($visitasu->visitas != null ? $visitasu->visitas : 0) + 1;
        $visitasu->fecha = $fecha;
        $visitasu->user_id = $url->user_id;
        $visitasu->url_id = $url->id;
        $visitasu->save();
        return response()->json("Update Visitas");
    }

    public function getUrlbyId($id, Request $request)
    {
        $url = Urls::with(['categoria', 'visitasr' => function ($query) {
            $query->orderBy('visitasr', 'desc');
        },'visitasp' => function ($query) {
            $query->orderBy('visitasp', 'desc');
        }])->where(['id' => $id, 'activa' => 1])->first();

        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');
        $lastd = date('t',strtotime($fecha));

        $chartganancias = [];
        $posg = 0;
        $maxg = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $ga = GananciasDiarias::where(['url_id' => $id])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->first();
            if($ga != null) {
                $divisor = ($request->get('role') == 'Administrador' ? 100 : ($request->get('role') == 'Moderador' ? 60 : 50));
                $chartganancias['ganancias'][$posg] = round(($ga->ganancia * $divisor / 100), 2, PHP_ROUND_HALF_DOWN);
                if($ga->ganancia >= $maxg)
                    $maxg = $ga->ganancia;
            }
            else
                $chartganancias['ganancias'][$posg] = 0;
            $chartganancias['dia'][$posg] = $i;
            $posg++;
        }

        if($chartganancias['dia'] == null) {
            $chartganancias['dia'] = [];
            $chartganancias['ganancias'] = [];
        }

        $gtotal = GananciasDiarias::where(['url_id' => $id])->sum('ganancia');
        $divisor = ($request->get('role') == 'Administrador' ? 100 : ($request->get('role') == 'Moderador' ? 60 : 50));

        $resultado['url'] = $url;
        $resultado['ganancias'] = $chartganancias;
        $resultado['maxg'] = $maxg;
        $resultado['fgdiarias'] = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d H:i');
        $resultado['gtotal'] = round(($gtotal * $divisor / 100), 2, PHP_ROUND_HALF_DOWN);

        return response()->json(base64_encode(json_encode($resultado)));
    }

    public function getUrls(Request $request){
        if($request->get('id') != null )
            $datos = Urls::with(['categoria', 'users'])->where(['user_id' => $request->get('id'), 'activa' => 1])->orderby('fecha', 'DESC')->get();
        else
            $datos = Urls::with(['categoria', 'users'])->where(['activa' => 1])->orderby('fecha', 'DESC')->get();
        return response()->json(["draw"=> 1, "recordsTotal"=> count($datos),"recordsFiltered"=> count($datos),'data' => $datos]);
    }

    public function getUrlsPop(){
        $datos = Urls::with(['categoria', 'users'])->where(['activa' => 1])->orderby('visitas', 'DESC')->limit(3)->offset(0)->get();
        return response()->json(base64_encode(json_encode($datos)));
    }

    public function Cpm(Request $request) {
        $cpm = CPM::find(1);
        $cpm->cpm = $request->get('cpm');
        $cpm->save();
        return response()->json($cpm);
    }

    public function acortar(Request $request)
    {
        $url = Urls::where(['user_id' => $request->get('user_id'), 'url_real' => $request->get('url')])->first();
        if($url != null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => ['url' => ['Url ya acortada por favor verifiquela y acorte otra']],
            ], 422);
        }

        $auth = base64_encode("admin:lsbarzaga");
        /*stream_context_set_default(
            array(
                'http' => array(
                    'method' => 'POST',
                    'header' => 'Content-Type: application/json',
                    'proxy' => "tcp://172.16.4.1:3128",
                    'request_fulluri' => true,
                    'header' => "Proxy-Authorization: Basic $auth"
                ),
                'ssl' => array(
                    'verify_peer'      => false,
                    'verify_peer_name' => false
                ),
            )
        );*/
        stream_context_create(array(
                    'http' => array(
                        'method' => 'POST',
                        'header' => 'Content-Type: application/json',
                        //'proxy' => "tcp://172.16.4.1:3128",
                        'request_fulluri' => true
                        //'header' => "Proxy-Authorization: Basic $auth"
                        ),
                    'ssl' => array(
                        'verify_peer'      => false,
                        'verify_peer_name' => false
                        ),
                    )
                );
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = FALSE;
        $internalErrors = libxml_use_internal_errors(true);
        $data = $dom->loadHTML(file_get_contents($request->get('url')));

        $metas = $dom->getElementsByTagName('meta'); 
        if($metas->length == 0)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => ['url' => ['Error obteniendo los metadatos']],
            ], 422);
        }  
        $metas_array = [];
        foreach($metas as $met)
        {   
            if($met->getAttribute('property') == "og:image")                
                $metas_array['image'] = $met->getAttribute('content');
            if($met->getAttribute('property') == "og:title")                
                $metas_array['titulo'] = $met->getAttribute('content');     
            if($met->getAttribute('property') == "og:description")                
                $metas_array['descripcion'] = $met->getAttribute('content');
            if($met->getAttribute('property') == "og:image:width")                
                $metas_array['width'] = $met->getAttribute('content');
            if($met->getAttribute('property') == "og:image:height")                
                $metas_array['height'] = $met->getAttribute('content');
        }          
        if(!isset($metas_array['descripcion'])){
            foreach($metas as $met)
            {
                if($met->getAttribute('name') == "description")                
                    $metas_array['descripcion'] = $met->getAttribute('content');
            }  
        }      
        if(!isset($metas_array['descripcion']))
            $metas_array['descripcion'] = $metas_array['titulo'];
        else
        if(isset($metas_array['descripcion']) && $metas_array['descripcion'] == null)
            $metas_array['descripcion'] = $metas_array['titulo'];
        if(!isset($metas_array['image'])) {
            $meta = get_meta_tags($request->get('url'));
            $metas_array['image'] = $meta['twitter:image'];
        }
        if(!isset($metas_array['image']))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => ['url' => ['Error obteniendo los metadatos']],
            ], 422);
        }  
        if($metas_array['image'] == null)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => ['url' => ['Error obteniendo los metadatos']],
            ], 422);
        }
        $imagen = file_get_contents($metas_array['image']);
        $ds = DIRECTORY_SEPARATOR;
        $dir = $ds.date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = substr(str_shuffle($characters),1,20);
        $short = substr(md5(time().$request->get('url')), 1, 7);

        $urls = new Urls();
        $urls->url_real = $request->get('url');
        $urls->url_acortada = $short;
        $urls->accion = utf8_encode($request->get('accion'));
        $urls->titulo = utf8_decode($metas_array['titulo']);
        $urls->descripcion = utf8_decode($metas_array['descripcion']);
        $urls->visitas = 0;
        $urls->fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d H:i');
        $urls->user_id = $request->get('user_id');
        $urls->categoria_id = $request->get('categoria');
        $urls->foto = 'imagenes'.$dir.$name.'.jpg';
        $urls->activa = 1;
        $urls->save();
        if(!is_dir('imagenes'.$dir))
            mkdir('imagenes'.$dir, 0777, true);
        file_put_contents('imagenes'.$dir.$name.'.jpg', $imagen);

        return response()->json("Url acortada", 200);
    }

    public function deleteUrl($id)
    {
        $url = Urls::find($id);
        /*if(file_exists($url->foto)) 
            unlink($url->foto);*/

        $url->activa = 0;
        $url->save();
        return response()->json('Url Eliminada', 200 );
    }

    public function getEstadisticas(Request $request) {
        $estadisticas = [];
        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');//
        $vdiarias = VisitasDiarias::where(['user_id' => $request->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        $gdiarias = GananciasDiarias::where(['user_id' => $request->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->sum('ganancia');
        $fvdiarias = Carbon::now()->setTimezone('America/Havana')->format('d/m/Y H:i');
        $visitas = Urls::where(['user_id' => $request->user_id])->sum('visitas');
        $lastd = date('t',strtotime($fecha));

        $start = date('Y-m-1',strtotime($fecha));
        $end = date('Y-m-t',strtotime($fecha));
        $gmensual = GananciasDiarias::where(['user_id' => $request->user_id])->whereBetween('fecha', [$start, $end])->sum('ganancia');

        $chartdias = [];
        $pos = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $di = VisitasDiarias::where(['user_id' => $request->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->first();
            if($di != null)
                $chartdias['visitas'][$pos] = $di->visitas;
            else
                $chartdias['visitas'][$pos] = 0;
            $chartdias['dia'][$pos] = $i;
            $pos++;
        }

        $chartganancias = [];
        $posg = 0;
        $maxg = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $ga = GananciasDiarias::where(['user_id' => $request->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->sum('ganancia');
            if($ga != null) {
                $chartganancias['ganancias'][$posg] = round($ga, 2, PHP_ROUND_HALF_DOWN);
                if($ga >= $maxg)
                    $maxg = $ga;
            }
            else
                $chartganancias['ganancias'][$posg] = 0;
            $chartganancias['dia'][$posg] = $i;
            $posg++;
        }

        if($chartdias['dia'] == null) {
            $chartdias['dia'] = [];
            $chartdias['visitas'] = [];
        }

        if($chartganancias['dia'] == null) {
            $chartganancias['dia'] = [];
            $chartganancias['ganancias'] = [];
        }

        $max = VisitasDiarias::where(['user_id' => $request->user_id])->max('visitas');
        $estadisticas['vdiarias'] = $vdiarias;
        $estadisticas['fvdiarias'] = $fvdiarias;
        $estadisticas['visitas'] = $visitas;
        $estadisticas['chartdias'] = $chartdias;
        $estadisticas['chartganancias'] = $chartganancias;
        $estadisticas['gdiarias'] = $gdiarias;
        $estadisticas['gmensual'] = $gmensual;
        $estadisticas['max'] = $max;
        $estadisticas['maxg'] = $maxg;

        return response()->json(base64_encode(json_encode($estadisticas)));
    }

    public function getEstadAdmin() {
        $estadisticas = [];
        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');//
        $gdiarias = GananciasDiarias::whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->sum('ganancia');
        $start = date('Y-m-1',strtotime($fecha));
        $end = date('Y-m-t',strtotime($fecha));
        $gmensual = GananciasDiarias::whereBetween('fecha', [$start, $end])->sum('ganancia');
        $fvdiarias = Carbon::now()->setTimezone('America/Havana')->format('d/m/Y H:i');
        $chartganancias = [];
        $posg = 0;
        $maxg = 0;
        $lastd = date('t',strtotime($fecha));
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $ga = GananciasDiarias::whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->sum('ganancia');
            if($ga != null) {
                $chartganancias['ganancias'][$posg] = round($ga, 2, PHP_ROUND_HALF_DOWN);
                if($ga >= $maxg)
                    $maxg = $ga;
            }
            else
                $chartganancias['ganancias'][$posg] = 0;
            $chartganancias['dia'][$posg] = $i;
            $posg++;
        }
        if($chartganancias['dia'] == null) {
            $chartganancias['dia'] = [];
            $chartganancias['ganancias'] = [];
        }
        $startDate = Carbon::now()->setTimezone('America/Havana');//Carbon::createFromFormat('d/m/Y', '20/08/2019');
        $endDate = Carbon::now()->setTimezone('America/Havana');//Carbon::createFromFormat('d/m/Y', '20/08/2019');//Carbon::now();

        /*$analyticsData = Analytics::performQuery(
            Period::create($startDate, $endDate),
            'ga:date',
            [
                'metrics' => 'ga:adsenseRevenue,ga:adsensePageImpressions',
                'dimensions' => 'ga:date'
            ]
        );

        $rows = $analyticsData->rows;
        $rpm = round(($rows[0][1] / $rows[0][2] * 1000), 2, PHP_ROUND_HALF_DOWN);*/

        $estadisticas['gdiarias'] = $gdiarias;
        $estadisticas['gmensual'] = $gmensual;
        $estadisticas['fvdiarias'] = $fvdiarias;
        $estadisticas['chartganancias'] = $chartganancias;
        $estadisticas['maxg'] = $maxg;
        /*$estadisticas['rpm'] = $rpm;*/

        return response()->json(base64_encode(json_encode($estadisticas)));
    }

    public function getUrlsAdmin(){
        $datos = Urls::with(['categoria', 'users'])->withCount(['ganancias as gan' => function ($query) {
            $query->select(\DB::raw('sum(ganancia)'));
        }])->orderby('fecha', 'DESC')->get();
        return response()->json(base64_encode(json_encode(["draw"=> 1, "recordsTotal"=> count($datos),"recordsFiltered"=> count($datos),'data' => $datos])));
    }

    public function deleteUrlAdmin($id)
    {
        $url = Urls::find($id);
        if(file_exists($url->foto)) 
            unlink($url->foto);
        $url->delete();
        return response()->json('Url Eliminada', 200 );
    }

    public function getMonthData() {
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
        return response()->json(base64_encode(json_encode($gmensual)));   
    }
}
