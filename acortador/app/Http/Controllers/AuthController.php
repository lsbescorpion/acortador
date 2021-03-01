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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Carbon\Carbon;

class AuthController extends Controller
{

	use ThrottlesLogins;

    protected $maxAttempts = 2; // Default is 5
    protected $decayMinutes = 1; // Default is 1

    public function username()
    {
        return request()->ip();
    }

    public function showLogin() {
    	return view('components.auth.login');
    }

    public function Login(Request $request) {
    	if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return redirect('login')
                ->withErrors(['locked' => '1']);
        }

    	$credentials = ['correo' => $request->get('email'), 'password' => $request->get('password')];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();            
            $this->clearLoginAttempts($request);
            return redirect('/');
        }
        $this->incrementLoginAttempts($request);
        return redirect('login')
            ->withErrors(['password' => 'Las credenciales no coinciden con ninguno de nuestro datos']);
    }

    public function logout() {
    	Auth::logout();
        return redirect('/');
    }

    public function DashBoard() {
        $user = Auth::user();
        $estadisticas = [];
        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');//
        $vdiarias = VisitasDiarias::where(['user_id' => $user->id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->first();
        $gdiarias = GananciasDiarias::where(['user_id' => $user->id])->whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->sum('ganancia');
        $fvdiarias = Carbon::now()->setTimezone('America/Havana')->format('d/m/Y H:i');
        $visitas = Urls::where(['user_id' => $user->id])->sum('visitas');
        $lastd = date('t',strtotime($fecha));

        $start = date('Y-m-1',strtotime($fecha));
        $end = date('Y-m-t',strtotime($fecha));
        $gmensual = GananciasDiarias::where(['user_id' => $user->id])->whereBetween('fecha', [$start, $end])->sum('ganancia');

        $chartdias = [];
        $pos = 0;
        $visitas_total = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $di = VisitasDiarias::where(['user_id' => $user->id])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->first();
            if($di != null) {
                $chartdias['visitas'][$pos] = $di->visitas;
                $visitas_total = $visitas_total + $di->visitas;
            }
            else
                $chartdias['visitas'][$pos] = 0;
            $chartdias['dia'][$pos] = date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i));
            $pos++;
        }

        $chartganancias = [];
        $posg = 0;
        $maxg = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $anno = date('Y',strtotime($fecha));
            $mes = date('m',strtotime($fecha));
            $ga = GananciasDiarias::where(['user_id' => $user->id])->whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->sum('ganancia');
            if($ga != null) {
                $chartganancias['ganancias'][$posg] = round($ga, 2, PHP_ROUND_HALF_DOWN);
                if($ga >= $maxg)
                    $maxg = $ga;
            }
            else
                $chartganancias['ganancias'][$posg] = 0;
            $chartganancias['dia'][$posg] = date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i));
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

        $max = VisitasDiarias::where(['user_id' => $user->id])->max('visitas');
        $estadisticas['vdiarias'] = $vdiarias;
        $estadisticas['fvdiarias'] = $fvdiarias;
        $estadisticas['visitas'] = $visitas;
        $estadisticas['chartdias'] = $chartdias;
        $estadisticas['chartganancias'] = $chartganancias;
        $estadisticas['gdiarias'] = $gdiarias;
        $estadisticas['gmensual'] = $gmensual;
        $estadisticas['max'] = $max;
        $estadisticas['maxg'] = $maxg;
        $estadisticas['visitas_total'] = $visitas_total;
        return view('components.dashboard', compact('estadisticas'));
    }

    public function Error404() {
        return view('components.404');
    }
}
