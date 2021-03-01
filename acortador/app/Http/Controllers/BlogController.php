<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Urls;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function blogIndex() {
    	$last3 = Blog::with(['categoria','users'])->orderby('id', 'DESC')->limit(3)->offset(0)->get();
    	$salud = Blog::with(['categoria','users'])->where(['categoria_id' => 1])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(5)->offset(0)->get();
    	$curiosidades = Blog::with(['categoria','users'])->where(['categoria_id' => 3])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(5)->offset(0)->get();
    	$manuales = Blog::with(['categoria','users'])->where(['categoria_id' => 6])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(5)->offset(0)->get();
    	$entres = Blog::with(['categoria','users'])->where(['categoria_id' => 2])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(5)->offset(0)->get();
    	$videos = Blog::with(['categoria','users'])->where(['categoria_id' => 4])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(5)->offset(0)->get();
    	$tecnos = Blog::with(['categoria','users'])->where(['categoria_id' => 5])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(5)->offset(0)->get();
    	return view('components.blog.page', compact('last3', 'salud', 'curiosidades', 'manuales', 'entres', 'videos', 'tecnos'));
    }

    public function AllSalud()
    {
        $blogs = Blog::with(['categoria','users'])->where(['categoria_id' => 1])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return view('components.blog.salud', compact('blogs'));
    }

    public function AllGracioso()
    {
        $blogs = Blog::with(['categoria','users'])->where(['categoria_id' => 2])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return view('components.blog.entretenimiento', compact('blogs'));
    }

    public function AllCurio()
    {
        $blogs = Blog::with(['categoria','users'])->where(['categoria_id' => 3])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return view('components.blog.curiosidades', compact('blogs'));
    }

    public function AllVideo()
    {
        $blogs = Blog::with(['categoria','users'])->where(['categoria_id' => 4])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return view('components.blog.videos', compact('blogs'));
    }

    public function AllTecno()
    {
        $blogs = Blog::with(['categoria','users'])->where(['categoria_id' => 5])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return view('components.blog.tecnologia', compact('blogs'));
    }

    public function AllManual()
    {
        $blogs = Blog::with(['categoria','users'])->where(['categoria_id' => 6])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->get();
        return view('components.blog.manualidades', compact('blogs'));
    }

    public function getBlog($categoria, $id)
    {
        $blog = Blog::with(['categoria','users'])->where(['id' => $id])->first();
        if($blog == null)
            $blog = Blog::with(['categoria','users'])->where(['slug' => $id])->first();

        if($blog == null) {
            return response()->json('Url no encontrada', 404);
        }
        $blog->visitas = $blog->visitas + 1;
        $blog->save();

        $categorias = Blog::with(['categoria','users'])->where(['categoria_id' => $blog->categoria->id])
        			->whereNotIn('id',[$blog->id])->orderby('visitas', 'DESC')->orderby('id', 'DESC')->limit(3)->offset(0)->get();
        return view('components.blog.post', compact('blog', 'categorias'));
    }

    public function addNoticia() {
        $blogs = Blog::with(['categoria','users'])->orderby('fecha', 'DESC')->get();//return $blogs;
        return view('components.blog.list', compact('blogs'));
    }

    public function createNoticia() {
        return view('components.blog.addnoticia');
    }

    public function showImageBlog($fileName) {
        if(Storage::disk('blog')->exists($fileName))
            return response()->file(storage_path('app/blog/'.DIRECTORY_SEPARATOR.$fileName));
        else
            return $fileName;
    }

    public function editNoticia(Request $request) {
        $photo = Storage::disk('blog')->files("temp");
        if($photo != null) {
            Storage::disk('blog')->delete($photo[0]);
        }
        $blog = Blog::with(['categoria'])->find($request->get('url_id'));
        return view('components.blog.editnoticia', compact('blog'));
    }

    public function removePhotoBlog(Request $request) {
        $blog = Blog::find($request->get('id'));
        if(Storage::disk('blog')->exists($blog->foto)) {
            Storage::disk('blog')->delete($blog->foto);
        }
        return response()->json("Foto delete");
    }

    public function uploadPhotoBlog(Request $request) {
        $photo = Storage::disk('blog')->files("temp");
        if($photo != null) {
            Storage::disk('blog')->delete($photo[0]);
        }
        Storage::disk('blog')->makeDirectory("temp");
        Storage::disk('blog')->putFile("temp", $request->file('file'));
        return response()->json("File uploaded");
    }

    public function updateNoticia(Request $request) {
        $blog = Blog::find($request->get('blog_id'));

        $blog->bloque1 = $request->get('bloque_1');
        $blog->bloque2 = $request->get('bloque_2');
        $blog->bloque_plano = $request->get('bloquep');
        $blog->titulo = $request->get('titulo');
        $blog->fecha = Carbon::now()->format('Y-m-d H:i');
        $blog->video = $request->get('video');
        $blog->slug = $request->get('slug');
        $blog->categoria_id = $request->get('categoria');

        $photo = Storage::disk('blog')->files("temp");
        if($photo != null) {
            $ds = DIRECTORY_SEPARATOR;
            $dir = date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds;
            $arr = explode('/', $photo[0]);
            Storage::disk('blog')->move($photo[0], $ds.$dir.$arr[count($arr) - 1]);
            $blog->foto = $dir.$ds.$arr[count($arr) - 1];
            $blog->foto_size = Storage::disk('blog')->size($dir.$ds.$arr[count($arr) - 1]);
        }

        $blog->save();
        return redirect()->route('addNoticia');
    }

    public function upNoticia(Request $request) {
        $user = Auth::user();
        $blog = new Blog();

        $blog->bloque1 = $request->get('bloque_1');
        $blog->bloque2 = $request->get('bloque_2');
        $blog->bloque_plano = $request->get('bloquep');
        $blog->titulo = $request->get('titulo');
        $blog->fecha = Carbon::now()->format('Y-m-d H:i');
        $blog->video = $request->get('video');
        $blog->slug = $request->get('slug');
        $blog->categoria_id = $request->get('categoria');
        $blog->user_id = $user->id;
        $blog->visitas = 0;

        $photo = Storage::disk('blog')->files("temp");
        if($photo != null) {
            $ds = DIRECTORY_SEPARATOR;
            $dir = date('Y',time()).$ds.date('m',time()).$ds.date('d',time()).$ds;
            $arr = explode('/', $photo[0]);
            Storage::disk('blog')->move($photo[0], $ds.$dir.$arr[count($arr) - 1]);
            $blog->foto = $dir.$ds.$arr[count($arr) - 1];
            $blog->foto_size = Storage::disk('blog')->size($dir.$ds.$arr[count($arr) - 1]);
        }

        $blog->save();
        return redirect()->route('addNoticia');
    }

    public function deleteNoticia(Request $request) {
        $blog = Blog::find($request->get('url_id'));
        if(Storage::disk('blog')->exists($blog->foto)) {
            Storage::disk('blog')->delete($blog->foto);
        }
        $blog->delete();
        return redirect()->route('addNoticia');
    }

    public function searchBlogs(Request $request) {
        $blogs = Blog::with(['categoria','users']);
        if($request->get('search') != null && $request->get('search') != '') {
            $blogs = $blogs->where(function($q) use($request) {
                $q->orwhere('titulo', 'LIKE', '%'.$request->get('search').'%');
                $q->orwhere('bloque1', 'LIKE', '%'.$request->get('search').'%');
                $q->orwhere('bloque2', 'LIKE', '%'.$request->get('search').'%');
            });
        }
        if($request->get('fechaa') != null && $request->get('fechaa') != '') {
            $blogs = $blogs->whereDate('fecha', '=', date('Y-m-d',strtotime($request->get('fechaa'))));
        }
        if($request->get('categoria') != null && $request->get('categoria') != '' && count($request->get('categoria')) > 0) {
            $blogs = $blogs->whereIn('categoria_id', $request->get('categoria'));
        }
        $blogs = $blogs->orderby('fecha', 'DESC')->get();
        return response()->json($blogs);
    }
}
