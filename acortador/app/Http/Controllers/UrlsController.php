<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\Referr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Analytics;
use Spatie\Analytics\Period;
use DeviceDetector\DeviceDetector;

class UrlsController extends Controller
{
    public function listUrls() {
    	$user = Auth::user();
    	$urls = Urls::with(['categoria'])->addSelect([
    		'ganancias' => GananciasDiarias::selectRaw('sum(ganancia) as total')
    		->whereColumn('url_id', 'urls.id')
    		->groupBy('url_id')
     	])->where(['activa' => 1, 'user_id' => $user->id])->orderby('fecha', 'DESC')->get();
    	return view('components.urls.page', compact('urls'));
    }

    public function acortarUrl(Request $request)
    {
    	$user = Auth::user();
        $url = Urls::where(['user_id' => $user->id, 'url_real' => $request->get('url')])->first();
        if($url == null)
        	$url = Urls::where(['user_id' => $user->id, 'url_real' => $request->get('url')."/"])->first();
        $messages = [
		    'url' => 'Url ya acortada por favor verifiquela y acorte otra',
		];
		if($url != null)
			return redirect('urls/list')->withErrors($messages);

        $auth = base64_encode("admin:lsbarzaga");
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
        if(strpos($request->get('url'), "youtube.com") != false || strpos($request->get('url'), "youtube.be") != false) {
            $ini = strpos($request->get('url'), 'watch?v=');
            $ini += strlen('watch?v=');
            $len = strlen($request->get('url'));
            $body = substr($request->get('url'), $ini, $len);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?id=".$body."&key=AIzaSyA_-PSjDLMR3WH1-AqRC5s8Q0aDF-EeU24&part=snippet");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

            $result = json_decode(curl_exec($ch));
            $imagen = file_get_contents($result->items[0]->snippet->thumbnails->high->url);

            $ds = DIRECTORY_SEPARATOR;
            $dir = $ds.date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $name = substr(str_shuffle($characters),1,20);
            //$short = substr(md5(time().$request->get('url')), 1, 10);
            $short = md5(time().$request->get('url'));

	        Storage::disk('imagenes')->makeDirectory($dir);
			Storage::disk('imagenes')->put($dir.$name.'.jpg', $imagen);

            $urls = new Urls();
            $urls->url_real = $request->get('url');
            $urls->url_acortada = $short;
            $urls->accion = $request->get('accion');//utf8_encode($request->get('accion'));
            $urls->titulo = $result->items[0]->snippet->title;//utf8_decode($result->items[0]->snippet->title);
            $urls->descripcion = $result->items[0]->snippet->title;//utf8_decode($result->items[0]->snippet->description);
            $urls->visitas = 0;
            $urls->fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d H:i');
            $urls->user_id = $user->id;
            $urls->categoria_id = $request->get('categoria');
            $urls->foto = $dir.$name.'.jpg';
            $urls->foto_real = $result->items[0]->snippet->thumbnails->high->url;
            $urls->activa = 1;
            $urls->save();

            return redirect()->route('listUrls');
        }
        else
            $data = $dom->loadHTML(file_get_contents($request->get('url')));

        $metas = $dom->getElementsByTagName('meta'); 
        if($metas->length == 0)
        {
        	$messages = [
			    'url' => 'Error obteniendo los metadatos',
			];
			return redirect('urls/list')->withErrors($messages);
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
            $messages = [
			    'url' => 'Error obteniendo los metadatos',
			];
			return redirect('urls/list')->withErrors($messages);
        }  
        if($metas_array['image'] == null)
        {
            $messages = [
			    'url' => 'Error obteniendo los metadatos',
			];
			return redirect('urls/list')->withErrors($messages);
        }
        $imagen = file_get_contents($metas_array['image']);
        $ds = DIRECTORY_SEPARATOR;
        $dir = $ds.date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = substr(str_shuffle($characters),1,20);
        //$short = substr(md5(time().$request->get('url')), 1, 10);
        $short = md5(time().$request->get('url'));

        Storage::disk('imagenes')->makeDirectory($dir);
		Storage::disk('imagenes')->put($dir.$name.'.jpg', $imagen);

        $urls = new Urls();
        $urls->url_real = $request->get('url');
        $urls->url_acortada = $short;
        $urls->accion = $request->get('accion');//utf8_encode($request->get('accion'));
        $urls->titulo = $metas_array['titulo'];//utf8_decode($metas_array['titulo']);
        $urls->descripcion = $metas_array['descripcion'];//utf8_decode($metas_array['descripcion']);
        $urls->visitas = 0;
        $urls->fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d H:i');
        $urls->user_id = $user->id;
        $urls->categoria_id = $request->get('categoria');
        $urls->foto = $dir.$name.'.jpg';
        $urls->foto_real = $metas_array['image'];
        $urls->activa = 1;
        $urls->save();

        return redirect('urls/list');
    }

    public function disableUrl(Request $request) {
    	$url = Urls::find($request->get('url_id'));
    	$url->activa = 0;
    	$url->save();
    	return redirect('urls/list');	
    }

    public function getEstaditicasUrl(Request $request) {
    	$url = Urls::with(['categoria', 'visitasr' => function ($query) {
            $query->orderBy('visitasr', 'desc');
        },'visitasp' => function ($query) {
            $query->orderBy('visitasp', 'desc');
        }])->where(['id' => $request->get('url_id'), 'activa' => 1])->first();

        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');
        $lastd = date('t',strtotime($fecha));

        $chartganancias = [];
        $posg = 0;
        $maxg = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $ga = GananciasDiarias::where(['url_id' => $request->get('url_id')])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->first();
            if($ga != null) {
                $chartganancias['ganancias'][$posg] = round($ga->ganancia, 2, PHP_ROUND_HALF_DOWN);
                if($ga->ganancia >= $maxg)
                    $maxg = $ga->ganancia;
            }
            else
                $chartganancias['ganancias'][$posg] = 0;
            $chartganancias['dia'][$posg] = date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i));
            $posg++;
        }

        if($chartganancias['dia'] == null) {
            $chartganancias['dia'] = [];
            $chartganancias['ganancias'] = [];
        }

        $chartdias = [];
        $pos = 0;
        $max = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $di = VisitasDiariasUrl::where(['url_id' => $request->get('url_id')])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->first();
            if($di != null) {
                $chartdias['visitas'][$pos] = $di->visitas;
                if($di->visitas >= $max)
                    $max = $di->visitas;
            }
            else
                $chartdias['visitas'][$pos] = 0;
            $chartdias['dia'][$pos] = date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i));
            $pos++;
        }

        if($chartdias['dia'] == null) {
            $chartdias['dia'] = [];
            $chartdias['visitas'] = [];
        }

        $gtotal = GananciasDiarias::where(['url_id' => $request->get('url_id')])->sum('ganancia');

        return view('components.urls.estadisticas', compact('chartganancias', 'maxg', 'gtotal', 'url', 'chartdias', 'max'));
    }

    public function searchUrls(Request $request) {
    	$user = Auth::user();
    	$urls = Urls::with(['categoria'])->addSelect([
    		'ganancias' => GananciasDiarias::selectRaw('sum(ganancia) as total')
    		->whereColumn('url_id', 'urls.id')
    		->groupBy('url_id')
     	])->where(['activa' => 1, 'user_id' => $user->id])->orderby('fecha', 'DESC');
     	if($request->get('search') != null && $request->get('search') != '') {
     		$urls = $urls->where(function($q) use($request) {
     			$q->orwhere('accion', 'LIKE', '%'.$request->get('search').'%');
     			$q->orwhere('titulo', 'LIKE', '%'.$request->get('search').'%');
     			$q->orwhere('descripcion', 'LIKE', '%'.$request->get('search').'%');
     		});
     	}
     	if($request->get('fechaa') != null && $request->get('fechaa') != '') {
     		$urls = $urls->whereDate('fecha', '=', date('Y-m-d',strtotime($request->get('fechaa'))));
     	}
     	if($request->get('categoria') != null && $request->get('categoria') != '' && count($request->get('categoria')) > 0) {
     		$urls = $urls->whereIn('categoria_id', $request->get('categoria'));
     	}
     	$urls = $urls->get();
    	return response()->json($urls);
    }

    public function getUrl($id) {
        $user = Auth::user();
        $agent = new Agent();
        $url = Urls::with(['categoria','ganancias'])->where(['url_acortada' => $id, 'activa' => 1])->first();

        if($url == null) {
            return redirect()->route('Error404');
        }
        $referr = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $crawlers = [
            'facebookexternalhit/1.1',
            'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
            'Facebot',
            'facebot',
        ];

        $dd = new DeviceDetector($_SERVER['HTTP_USER_AGENT']);
        $dd->parse();

        if($dd->isBot()) {
          $botInfo = $dd->getBot();
          if(strpos(strtolower($botInfo), 'facebook') === false)
            return redirect()->away($url->url_real);
        }

        if(!str_contains(strtolower($_SERVER['HTTP_USER_AGENT']), $crawlers)) {
            return redirect()->away($url->url_real);
        }

        if($user != 'null') {
            return redirect()->away($url->url_real);
        }

        if(!$agent->isMobile() && !$agent->isTablet()) {
            return redirect()->away($url->url_real);
        }

        if($agent->isRobot()) {
            $robot = $agent->robot();
            if(strpos(strtolower($robot), 'facebook') === false)
                return redirect()->away($url->url_real);
        }

        if($referr == '' || strpos($referr, 'facebook') === false) {
            return redirect()->away($url->url_real);
        }
        
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $host = strtolower(gethostbyaddr($ip));
        if($ip == '' || strpos($host, 'facebook') === false)
            return redirect()->away($url->url_real);
        
        $ips = \Location::get();
        if($ips == null || $ips->countryCode == 'CU') {
            return redirect()->away($url->url_real);
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

        $re = UrlVisitaR::where(['url_id' => $url->id, 'referr' => $referr])->first();

        if($re == null)
            $re = new UrlVisitaR();

        $re->visitasr = ($re->visitasr != null ? $re->visitasr : 0) + 1;
        $re->url_id = $url->id;
        $re->referr = $referr;
        $re->save();

        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');

        $url->visitas = $url->visitas + 1;
        $url->save();

        $visitas = VisitasDiarias::where(['user_id' => $url->user_id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        if($visitas == null)
            $visitas = new VisitasDiarias();

        $visitas->visitas = ($visitas->visitas != null ? $visitas->visitas : 0) + 1;
        $visitas->fecha = $fecha;
        $visitas->user_id = $url->user_id;
        $visitas->save();

        $visitasu = VisitasDiariasUrl::where(['user_id' => $url->user_id, 'url_id' => $url->id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        if($visitasu == null)
            $visitasu = new VisitasDiariasUrl();

        $visitasu->visitas = ($visitasu->visitas != null ? $visitasu->visitas : 0) + 1;
        $visitasu->fecha = $fecha;
        $visitasu->user_id = $url->user_id;
        $visitasu->url_id = $url->id;
        $visitasu->save();
        
        return view('components.urls.temporal', compact('url'));
    }
}
