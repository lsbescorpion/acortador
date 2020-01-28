<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Urls;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function getBlogs(Request $request){
        $datos = Blog::with(['categoria','users'])->orderby('id', 'DESC')->get();
        return response()->json(["draw"=> 1, "recordsTotal"=> count($datos),"recordsFiltered"=> count($datos),'data' => $datos]);
    }

    public function getBlog($id)
    {
        $blog = Blog::with(['categoria','users'])->where(['id' => $id])->first();
        if($blog == null)
            $blog = Blog::with(['categoria','users'])->where(['slug' => $id])->first();

        if($blog == null) {
            return response()->json('Url no encontrada', 404);
        }
        $blog->visitas = $blog->visitas + 1;
        $blog->save();
        return response()->json($blog);
    }

    public function getBlogEdit($id)
    {
        $blog = Blog::with(['categoria','users'])->where(['id' => $id])->first();
        return response()->json($blog);
    }

    public function lastNoti3()
    {
        $blog = Blog::with(['categoria','users'])->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function Popular()
    {
        $blog = Blog::with(['categoria','users'])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function LastSalud()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 1])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function LastCuriosidades()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 3])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function LastManualidades()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 6])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function LastEntretenimientos()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 2])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function LastVideos()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 4])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function LastTecnologia()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 5])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(4)->offset(0)->get();
        return response()->json($blog);
    }

    public function AllSalud()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 1])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return response()->json($blog);
    }

    public function AllGracioso()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 2])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return response()->json($blog);
    }

    public function AllCurio()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 3])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return response()->json($blog);
    }

    public function AllVideo()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 4])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return response()->json($blog);
    }

    public function AllTecno()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 5])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return response()->json($blog);
    }

    public function AllManual()
    {
        $blog = Blog::with(['categoria','users'])->where(['categoria_id' => 6])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return response()->json($blog);
    }

    public function photob(Request $request) {
        if ($handle = opendir('tempb')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $ds = DIRECTORY_SEPARATOR;
                    unlink('tempb'.$ds.$entry);
                }
            }
            closedir($handle);
        }
        $ds = DIRECTORY_SEPARATOR; 
        $storeFolder = 'tempb';         
        if(!empty($_FILES)) {   
            $tempFile = $_FILES['file']['tmp_name'];     
            $targetPath = $storeFolder . $ds;
            $targetFile = $targetPath.$_FILES['file']['name'];
            move_uploaded_file($tempFile,$targetFile);          
        }
        return response()->json("Imagen asignada", 200);
    }

    public function removePhotob(Request $request) {
        $ds = DIRECTORY_SEPARATOR; 
        $storeFolder = 'tempb';
        $targetPath = $storeFolder . $ds;
        $targetFile = $targetPath.$request->get("photob");
        if($request->get("id") == 0 && file_exists($targetFile)) {
            unlink($targetFile);
            return response()->json("Imagen eliminada", 200);
        }
        else {
            $blog = Blog::find($request->get("id"));
            if(file_exists($blog->foto)) {
                unlink($blog->foto);
                if($request->get("id") != 0){                    
                    $blog->foto = null;
                    $blog->foto_size = 0;
                    $blog->save();
                }
            }
            return response()->json("Imagen eliminada", 200);
        }
    }

    public function createBlog(Request $request) {
        $blog = new Blog();

        $blog->bloque1 = $request->get('bloque1');
        $blog->bloque2 = $request->get('bloque2');
        $blog->bloque_plano = $request->get('bloquep');
        $blog->titulo = $request->get('titulo');
        $blog->fecha = Carbon::now()->format('Y-m-d H:i');
        $blog->video = $request->get('video');
        $blog->slug = $request->get('slug');
        $blog->visitas = 0;
        $blog->user_id = $request->get('user_id');
        $blog->categoria_id = $request->get('categoria');
        $blog->save();

        if ($handle = opendir('tempb')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $ds = DIRECTORY_SEPARATOR;
                    $dir = $ds.date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds; 
                    $storeFolder = 'blog';
                    if(!is_dir('blog'.$dir))
                        mkdir('blog'.$dir, 0777, true);
                    $fileMoved = rename('tempb'.$ds.$entry, $storeFolder.$dir.$entry);
                    $blog->foto = $storeFolder.$dir.$entry;
                    $blog->foto_size = filesize($storeFolder.$dir.$entry);
                    $blog->save();
                }
            }
            closedir($handle);
        }
        
        return response()->json("Noticia acortada", 200);
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->bloque1 = $request->get('bloque1');
        $blog->bloque2 = $request->get('bloque2');
        $blog->bloque_plano = $request->get('bloquep');
        $blog->titulo = $request->get('titulo');
        $blog->fecha = Carbon::now()->format('Y-m-d H:i');
        $blog->video = $request->get('video');
        $blog->slug = $request->get('slug');
        //$blog->user_id = $request->get('user_id');
        $blog->categoria_id = $request->get('categoria');

        if ($handle = opendir('tempb')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if($blog->foto != null) {
                        if(file_exists($blog->foto))
                            unlink($blog->foto);
                    }
                    $ds = DIRECTORY_SEPARATOR;
                    $dir = $ds.date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds; 
                    $storeFolder = 'blog';
                    if(!is_dir('blog'.$dir))
                        mkdir('blog'.$dir, 0777, true);
                    $fileMoved = rename('tempb'.$ds.$entry, $storeFolder.$dir.$entry);
                    $blog->foto = $storeFolder.$dir.$entry;
                    $blog->foto_size = filesize($storeFolder.$dir.$entry);
                }
            }
            closedir($handle);
        }
        $blog->save();

        return response()->json('Noticia Actualizada', 200 );
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        if(file_exists($blog->foto)) 
            unlink($blog->foto);
        $blog->delete();
        return response()->json('Noticia Eliminada', 200 );
    }

    public function remPhotosb(Request $request) {
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
}
