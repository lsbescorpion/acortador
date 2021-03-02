<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Urls;
use App\Models\VisitasDiarias;
use App\Models\VisitasDiariasUrl;
use App\Models\GananciasDiarias;
use App\Models\GananciasMensuales;
use App\Models\CPM;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UsersController extends Controller{

	public function getUsers() {
		$users = User::with(['roles'])->orderby('id', 'ASC')->get();
		return view('components.user.page', compact('users'));
	}

	public function showAvatar($fileName){
		if(Storage::disk('avatars')->exists($fileName))
			return response()->file(storage_path('app/avatars'.DIRECTORY_SEPARATOR.$fileName));
		else
			return '';
	}

	public function showImageUrl($fileName) {
		if(Storage::disk('imagenes')->exists($fileName))
			return response()->file(storage_path('app/imagenes'.DIRECTORY_SEPARATOR.$fileName));
		else
			return '';
	}

	public function createUser() {
		$photo = Storage::disk('avatars')->files("temp");
        if($photo != null) {
            Storage::disk('avatars')->delete($photo[0]);
        }
		return view('components.user.create');
	}

	public function saveUser(Request $request) {
		$messages = [
		    'correo.unique' => 'Correo en uso',
		    'correo.email' => 'Formato de correo incorrecto',
		];
		Validator::make($request->all(), [
		    'correo' => 'unique:user',
		], $messages)->validate();
		$user = new User();
        $user->password = Hash::make($request->get('password'));
        $user->correo = $request->get('correo');
        $user->nombre_apellidos = $request->get('name');
        $user->perfil_fb = $request->get('perfil_fb');
        $user->activo = 1;
        $user->created_at = date('Y-m-d H:i:s', time());
        $user->updated_at = date('Y-m-d H:i:s', time());

        $user->save();
        $user->assignRole($request->get('rol'));
        $photo = Storage::disk('avatars')->files("temp");
        if($photo != null) {
        	$ds = DIRECTORY_SEPARATOR;
        	$mes = date('m',strtotime($user->created_at));
	        $anno = date('Y',strtotime($user->created_at));
	        $dir = $anno.$ds.$mes.$ds.$user->id;
	        Storage::disk('avatars')->makeDirectory($dir);
	        $arr = explode('/', $photo[0]);
            Storage::disk('avatars')->move($photo[0], $dir.$ds.$arr[count($arr) - 1]);
			$user->foto = $dir.$ds.$arr[count($arr) - 1];
			$user->foto_size = Storage::disk('avatars')->size($dir.$ds.$arr[count($arr) - 1]);
			$user->save();
        }
		return redirect()->route('users');
	}

	public function uploadPhoto(Request $request) {
		$photo = Storage::disk('avatars')->files("temp");
        if($photo != null) {
            Storage::disk('avatars')->delete($photo[0]);
        }
		Storage::disk('avatars')->makeDirectory("temp");
		Storage::disk('avatars')->putFile("temp", $request->file('file'));
		return response()->json("File uploaded");
	}

	public function removePhoto(Request $request) {
		$photo = Storage::disk('avatars')->files("temp");
        if($photo != null) {
            Storage::disk('avatars')->delete($photo[0]);
        }
		return response()->json("File delete");
	}

	public function removePhotoUser(Request $request) {
		$user = User::find($request->get('user_id'));
		$photo = Storage::disk('avatars')->exists($user->foto);
        if($photo) {
            Storage::disk('avatars')->delete($user->foto);
            $user->foto = null;
            $user->foto_size = 0;
            $user->save();
        }
		return response()->json("File delete");
	}

	public function edituser(Request $request) {
		$photo = Storage::disk('avatars')->files("temp");
        if($photo != null) {
            Storage::disk('avatars')->delete($photo[0]);
        }
        $id = \Session::get('user_id');
        $user_id = ($request->get('user_id') != null ? $request->get('user_id') : ($id != null ? $id : 0));
		$user = User::with(['roles'])->find($user_id);
		if($user == null)
			return redirect()->route('users');
		return view('components.user.edit', compact('user', 'user_id'));
	}

	public function updateUser(Request $request) {
		$messages = [
		    'correo' => 'Correo en uso',
		];
		$user = User::where(['correo' => $request->get('correo')])->first();
		if($user->id != $request->get('user_id'))
			return redirect('admin/edituser')
				->withErrors($messages)
				->with(['user_id' => $request->get('user_id')]);
		$user = User::find($request->get('user_id'));
		if($request->get('password') != null)
        	$user->password = Hash::make($request->get('password'));
        $user->correo = $request->get('correo');
        $user->nombre_apellidos = $request->get('name');
        $user->perfil_fb = $request->get('perfil_fb');
        $user->activo = 1;
        $user->updated_at = date('Y-m-d H:i:s', time());

        $user->save();
        $user->syncRoles($request->get('rol'));
        $photo = Storage::disk('avatars')->files("temp");
        if($photo != null) {
        	$ds = DIRECTORY_SEPARATOR;
        	$mes = date('m',strtotime($user->created_at));
	        $anno = date('Y',strtotime($user->created_at));
	        $dir = $anno.$ds.$mes.$ds.$user->id;
	        Storage::disk('avatars')->makeDirectory($dir);
	        $arr = explode('/', $photo[0]);
            Storage::disk('avatars')->move($photo[0], $dir.$ds.$arr[count($arr) - 1]);
			$user->foto = $dir.$ds.$arr[count($arr) - 1];
			$user->foto_size = Storage::disk('avatars')->size($dir.$ds.$arr[count($arr) - 1]);
			$user->save();
        }
		return redirect()->route('users');
	}

	public function activeUser(Request $request) {
		$user = User::find($request->get('user_id'));
        $user->activo = 1;
        $user->updated_at = date('Y-m-d H:i:s', time());

        $user->save();
		return redirect()->route('users');
	}

	public function blockUser(Request $request) {
		$user = User::find($request->get('user_id'));
        $user->activo = 2;
        $user->updated_at = date('Y-m-d H:i:s', time());

        $user->save();
		return redirect()->route('users');
	}

	public function deleteUser(Request $request) {
		$user = User::find($request->get('user_id'));
		if($user->foto != null) {
			if(Storage::disk('avatars')->exists($user->foto)) {
				Storage::disk('avatars')->delete($user->foto);
			}
		}
        $user->delete();
		return redirect()->route('users');
	}

	public function personalIn(Request $request) {
		$user = Auth::user();
		return view('components.user.perfil', compact('user'));
	}

	public function savePersonalIn(Request $request) {
		$user = Auth::user();
		$user->nombre_apellidos = $request->get('name');
		$user->perfil_fb = $request->get('perfil_fb');
		if($_FILES['profile_avatar']['tmp_name'] != '' && $_FILES['profile_avatar']['tmp_name'] != '') {
            $ds = DIRECTORY_SEPARATOR;
        	$mes = date('m',strtotime($user->created_at));
	        $anno = date('Y',strtotime($user->created_at));
	        $dir = $anno.$ds.$mes.$ds.$user->id;
            Storage::disk('avatars')->makeDirectory($dir);
            if($user->foto != "" && $user->foto != null) {
                $exists = Storage::disk('avatars')->exists($user->foto);
                if($exists) {
                    Storage::disk('avatars')->delete($user->foto);
                }
            }
            Storage::disk('avatars')->putFile($dir, $_FILES['profile_avatar']['tmp_name']);
            $photo = Storage::disk('avatars')->files($dir);
            $ph = explode("/", $photo[0]);
            $user->foto = $dir."/".$ph[count($ph) - 1];
            $user->foto_size = Storage::disk('avatars')->size($dir.$ds.$ph[count($ph) - 1]);
        }
        else {
            if(($user->foto != "" && $user->foto != null) && $request->get('profile_avatar_remove') == 1) {
                $exists = Storage::disk('avatars')->exists($user->foto);
                if($exists) {
                    Storage::disk('avatars')->delete($user->foto);
                }
                $user->foto = "";
                $user->foto_size = 0;
            }
        }
        $user->save();
		return redirect()->route('personalIn');
	}

	public function infoPago() {
		$user = Auth::user();
		return view('components.user.pago', compact('user'));
	}

	public function updatePago(Request $request) {
		$user = Auth::user();
		$messages = [
		    'name.required' => 'El nombre es requerido',
		    'ci.required' => 'El ci es requerido',
		    'direccion.required' => 'La dirección es requerida',
		    'metodo.required' => 'El método de pago es requerido',
		    'tarjeta.required' => 'La tarjeta es requerida',
		];
		Validator::make($request->all(), [
		    'name' => 'required',
		    'ci' => 'required',
		    'direccion' => 'required',
		    'metodo' => 'required',
		    'tarjeta' => 'required',
		], $messages)->validate();

		$perfil = ($user->perfil != null ? $user->perfil : new Perfil());
        $perfil->ci = $request->get('ci');
        $perfil->direccion = $request->get('direccion');
        $perfil->user_id = $user->id;
        $perfil->banco = $request->get('metodo');
        $perfil->moneda = ($request->get('metodo') < 5 ? 1 : ($request->get('metodo') >= 5 && $request->get('metodo') < 9 ? 2 : 3));
        $perfil->tarjeta = $request->get('tarjeta');
        $perfil->telefono = $request->get('telefono');
        $perfil->paypal = $request->get('paypal');
        $perfil->name = $request->get('name');
        $perfil->save();
		return redirect()->route('infoPago');
	}

	public function passwordUser() {
		$user = Auth::user();
		return view('components.user.password', compact('user'));
	}

	public function updatePassword(Request $request) {
		$user = Auth::user();
		$messages = [
		    'password.required' => 'La contraseña es requerida',
		    'password.confirmed' => 'Las contraseñas no coinciden',
		    'password.min' => 'Mínimo de caracteres requeridos es 6',
		];
		Validator::make($request->all(), [
		    'password' => 'required|confirmed|min:6',
		], $messages)->validate();

		$user->password = Hash::make($request->get('password'));
        $user->save();
		return redirect()->route('passwordUser');
	}

	public function GananciaMenuales() {
		$user = Auth::user();
        $mensuales = GananciasMensuales::where(['user_id' => $user->id])->orderBy('anno', 'desc')->orderBy('mes', 'desc')->get();
        $annomin = GananciasMensuales::where(['user_id' => $user->id])->min('anno');
        return view('components.user.pagomensual', compact('mensuales', 'annomin'));
    }

    public function Ranking() {
    	$start = '2020-01-01';//date('Y-m-01', time());//'2020-03-01';
        $end = '2020-12-31';//date('Y-m-t', time());
    	$users = User::addSelect([
    		'visitasd' => VisitasDiarias::selectRaw('sum(visitas) as total')
    		->whereColumn('user_id', 'user.id')
    		->whereBetween('fecha', [$start, $end])
    		->groupBy('user_id')
     	])->whereHas('visitasd')->orderby('visitasd', 'desc')->get();
    	return view('components.user.ranking', compact('users'));
    }

    public function estadisticasAdmin() {
    	$estadisticas = [];
        $fecha = Carbon::now()->setTimezone('America/Havana')->format('Y-m-d');//
        $gdiarias = GananciasDiarias::whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->sum('ganancia');
        $vdiarias = VisitasDiarias::whereDate('fecha', '=', date('Y-m-d',strtotime($fecha)))->sum('visitas');
        $start = date('Y-m-1',strtotime($fecha));
        $end = date('Y-m-t',strtotime($fecha));
        $gmensual = GananciasDiarias::whereBetween('fecha', [$start, $end])->sum('ganancia');
        $vmensual = VisitasDiarias::whereBetween('fecha', [$start, $end])->sum('visitas');
        $fvdiarias = Carbon::now()->setTimezone('America/Havana')->format('d/m/Y H:i');
        $chartganancias = [];
        $posg = 0;
        $maxg = 0;
        $lastd = date('t',strtotime($fecha));
        $anno = date('Y',strtotime($fecha));
		$mes = date('m',strtotime($fecha));
        for($i = 1; $i <= $lastd; $i++) {
            $ga = GananciasDiarias::whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->sum('ganancia');
            if($ga != null) {
                $chartganancias['ganancias'][$posg] = round($ga, 2, PHP_ROUND_HALF_DOWN);
                if($ga >= $maxg)
                    $maxg = $ga;
            }
            else
                $chartganancias['ganancias'][$posg] = 0;
            $chartganancias['dia'][$posg] = date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i));;
            $posg++;
        }
        if($chartganancias['dia'] == null) {
            $chartganancias['dia'] = [];
            $chartganancias['ganancias'] = [];
        }

        $chartdias = [];
        $pos = 0;
        $visitas_total = 0;
        for($i = 1; $i <= $lastd; $i++) {
            $di = VisitasDiarias::whereDate('fecha', '=', date('Y-m-d',strtotime($anno.'-'.$mes.'-'.$i)))->first();
            if($di != null) {
                $chartdias['visitas'][$pos] = $di->visitas;
                $visitas_total = $visitas_total + $di->visitas;
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

        $max = VisitasDiarias::whereBetween('fecha', [$start, $end])->max('visitas');

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
        $cpm = CPM::find(1);

        $users = User::with('roles')->withCount(['ganancias as gan' => function ($query) use($start, $end) {
            $query->select(\DB::raw('sum(ganancia) as gmensual'))->whereBetween('fecha', [$start, $end])->orderby('gmensual', 'DESC');
        }])->get();

        $urls = Urls::with(['categoria', 'users'])->withCount(['ganancias as gan' => function ($query) {
            $query->select(\DB::raw('sum(ganancia) as gtotal'))->orderby('gtotal', 'DESC')->orderby('fecha', 'DESC');
        }])->get();//return $users;

        $estadisticas['gdiarias'] = $gdiarias;
        $estadisticas['gmensual'] = $gmensual;
        $estadisticas['vdiarias'] = $vdiarias;
        $estadisticas['vmensual'] = $vmensual;
        $estadisticas['fvdiarias'] = $fvdiarias;
        $estadisticas['chartganancias'] = $chartganancias;
        $estadisticas['chartdias'] = $chartdias;
        $estadisticas['maxg'] = $maxg;
        $estadisticas['max'] = $max;
        $estadisticas['cpm'] = $cpm;
    	return view('components.user.estadisticas', compact('estadisticas', 'users', 'urls'));
    }

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
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://free.currconv.com/api/v7/convert?q=USD_UYU&compact=y&apiKey=abbb5bcd94ffcb4df7ca');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $data = curl_exec($ch); 
        curl_close($ch);
        $rates = json_decode($data, true);

        $uyu = $rates['USD_UYU']['val'];

        $rows = $analyticsData->rows;
        for($i = 0; $i < count($rows); $i++) {
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
            $ganancias->ganancia = round(($visitas[$i]->visitas*$cpm->cpm)/1000, 2, PHP_ROUND_HALF_DOWN);
            $ganancias->save();
        }
        return redirect()->route('estadisticasAdmin');
        //return response()->json($analyticsData);
    }

    public function deleteUrl(Request $request) {
        $url = Urls::find($request->get('url_id'));
        $url->delete();
        return redirect()->route('estadisticasAdmin');
    }

}

