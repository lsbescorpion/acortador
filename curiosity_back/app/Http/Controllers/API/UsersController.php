<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function getUserIdent(Request $request) {
        if($request->get('ident') != null) {
            $user = User::where(['NO_IDENTIFICACION' => $request->get('ident')])->first();
            if($user != null)
                return response()->json(false);
            return response()->json(true);
        }
        else
        if($request->get('user') != null) {
            $user = User::where(['USUARIO' => $request->get('user')])->first();
            if($user != null)
                return response()->json(false);
            return response()->json(true);
        }
        else
        if($request->get('correo') != null) {
            $user = User::where(['CORREO' => $request->get('correo')])->first();
            if($user != null)
                return response()->json(false);
            return response()->json(true);
        }
    }

    public function logout(Request $request) {

    }

    public function logins(Request $request) {

        $user = User::where(['correo' => $request->get('correo'), 'activo' => 1])->first();
        if ($user != null) {
            if(Hash::check($request->get('password'), $user->password)) {
                $success['token'] = base64_encode($user->id." ".$user->correo." ".Carbon::now()->format('Y-m-d H:i')." ".request()->ip());
                $success['user'] = $user;
                $success['role'] = $user->roles()->pluck('name')[0];
                $success['url'] = '/estadisticas';
                return response()->json($success, 200 );
            }
            else
                return response()->json( ['logins' => 'Usuario o Contrasena incorrectos'], 401 );
        }
        return response()->json( ['logins' => 'Usuario o Contrasena incorrectos'], 401 );
    }

    public function getUser($id)
    {
        $user = User::with(['roles','perfil','urls'])->where(['id' => $id])->first();

        $visitas = Urls::where(['user_id' => $id])->sum('visitas');

        $user->visitas = $visitas;

        return response()->json($user);
    }

    public function getUsers(Request $request){
        $datos = User::with(['roles'])->orderby('id', 'ASC')->get();
        return response()->json(["draw"=> 1, "recordsTotal"=> count($datos),"recordsFiltered"=> count($datos),'data' => $datos]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $userold = User::where('correo', '=', $request->input('correo'))->first();
        if($userold != null && $userold->id != $user->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => ['email' => ['Correo en uso']],
            ], 422);
        }
        $user->correo = $request->get('correo');
        $user->nombre_apellidos = $request->get('nombre_apellidos');
        $user->perfil_fb = $request->get('perfil_fb');
        $user->activo = ($request->get('activo') == true ? 1 : 0);
        if($request->get('password') != "")
            $user->password = Hash::make($request->get('password'));

        if ($handle = opendir('temp')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $ds = DIRECTORY_SEPARATOR; 
                    $storeFolder = 'photos'; 
                    if($user->FOTO != null) {
                        if(file_exists($storeFolder.$ds."ID(".$id.")".$user->foto)) 
                            unlink($storeFolder.$ds."ID(".$id.")".$user->foto);
                    } 
                    $fileMoved = rename('temp'.$ds.$entry, $storeFolder.$ds."ID(".$id.")".$entry);
                    $user->foto = $entry;
                    $user->foto_size = filesize($storeFolder.$ds."ID(".$id.")".$entry);
                }
            }
            closedir($handle);
        }
        $user->save();

        $user->syncRoles($request->get('rol'));

        return response()->json('Usuario Actualizado', 200 );
    }

    public function createUser(Request $request)
    {
        $user = new User();
        $user->password = Hash::make($request->get('password'));
        $user->correo = $request->get('correo');
        $user->nombre_apellidos = $request->get('nombre_apellidos');
        $user->perfil_fb = $request->get('perfil_fb');
        $user->activo = ($request->get('activo') == true ? 1 : 0);;

        $user->save();
        $user->assignRole($request->get('rol'));

        if ($handle = opendir('temp')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $ds = DIRECTORY_SEPARATOR; 
                    $storeFolder = 'photos';  
                    $fileMoved = rename('temp'.$ds.$entry, $storeFolder.$ds."ID(".$user->id.")".$entry);
                    $user->foto = $entry;
                    $user->foto_size = filesize($storeFolder.$ds."ID(".$user->id.")".$entry);
                    $user->save();
                }
            }
            closedir($handle);
        }
        
        return response()->json('Usuario creado', 200 );
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->foto != null) {
            $ds = DIRECTORY_SEPARATOR; 
            $storeFolder = 'photos';
            if(file_exists($storeFolder.$ds."ID(".$user->id.")".$user->foto)) 
                unlink($storeFolder.$ds."ID(".$user->id.")".$user->foto);
        } 
        $user->delete();
        return response()->json('Usuario Eliminado', 200 );
    }

    public function updatePerfil(Request $request, $id)
    {
        $user = User::find($id);

        $user->nombre_apellidos = $request->get('nombre_apellidos');
        $user->perfil_fb = $request->get('perfil_fb');
        if($request->get('password') != "")
            $user->password = Hash::make($request->get('password'));

        if ($handle = opendir('temp')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $ds = DIRECTORY_SEPARATOR; 
                    $storeFolder = 'photos'; 
                    if($user->FOTO != null) {
                        if(file_exists($storeFolder.$ds."ID(".$id.")".$user->foto)) 
                            unlink($storeFolder.$ds."ID(".$id.")".$user->foto);
                    } 
                    $fileMoved = rename('temp'.$ds.$entry, $storeFolder.$ds."ID(".$id.")".$entry);
                    $user->foto = $entry;
                    $user->foto_size = filesize($storeFolder.$ds."ID(".$id.")".$entry);
                }
            }
            closedir($handle);
        }
        $user->save();

        $perfil = ($user->perfil != null ? $user->perfil : new Perfil());
        $perfil->ci = $request->get('ci');
        $perfil->direccion = $request->get('direccion');
        $perfil->user_id = $id;
        $perfil->banco = $request->get('metodo');
        $perfil->moneda = $request->get('metodo');
        $perfil->tarjeta = $request->get('tarjeta');
        $perfil->save();

        return response()->json($user);
    }

    public function photo(Request $request) {
        if ($handle = opendir('temp')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $ds = DIRECTORY_SEPARATOR;
                    unlink('temp'.$ds.$entry);
                }
            }
            closedir($handle);
        }
        $ds = DIRECTORY_SEPARATOR; 
        $storeFolder = 'temp';         
        if(!empty($_FILES)) {   
            $tempFile = $_FILES['file']['tmp_name'];     
            $targetPath = $storeFolder . $ds;
            $targetFile = $targetPath.$_FILES['file']['name'];
            move_uploaded_file($tempFile,$targetFile);          
        }
        return response()->json("Foto asignada", 200);
    }

    public function removePhoto(Request $request) {
        $ds = DIRECTORY_SEPARATOR; 
        $storeFolder = 'temp';
        $targetPath = $storeFolder . $ds;
        $targetFile = $targetPath.$request->get("photo");
        if($request->get("id") == 0 && file_exists($targetFile)) {print_r("expression");
            unlink($targetFile);
            return response()->json("Foto eliminada", 200);
        }
        else {
            $storeFolder = 'photos';
            $targetPath = $storeFolder . $ds;
            $targetFile = $targetPath."ID(".$request->get("id").")".$request->get("photo");
            if(file_exists($targetFile)) {print_r("expression1");
                unlink($targetFile);
                if($request->get("id") != 0){
                    $personal = User::find($request->get("id"));
                    $personal->foto = null;
                    $personal->save();
                }
            }
            return response()->json("Foto eliminada", 200);
        }
    }

    public function remPhotos(Request $request) {
        $ds = DIRECTORY_SEPARATOR; 
        $storeFolder = 'temp';
        $targetPath = $storeFolder . $ds;
        $targetFile = $targetPath.$request->get("photo");
        if($request->get("id") == 0 && file_exists($targetFile)) {
            unlink($targetFile);
            return response()->json("Foto eliminada", 200);
        }
        else {
            $storeFolder = 'photos';
            $targetPath = $storeFolder . $ds;
            $targetFile = $targetPath."ID(".$request->get("id").")".$request->get("photo");
            if(file_exists($targetFile)) {
                unlink($targetFile);
                if($request->get("id") != 0){
                    $personal = User::find($request->get("id"));
                    $personal->foto = null;
                    $personal->save();
                }
            }
            return response()->json("Foto eliminada", 200);
        }
    }

    public function getGanancias() {
        $users = User::with('roles')->withCount(['ganancias as gan' => function ($query) {
            $query->select(\DB::raw('sum(ganancia)'));
        }])->get();
        return response()->json(["draw"=> 1, "recordsTotal"=> count($users),"recordsFiltered"=> count($users),'data' => $users]);
    }
}
