<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::get();
        return view('dashbboard.blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashbboard.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ////
        try {
            DB::beginTransaction();
            //CODIGO REQUERIDO
            if(empty($request->description_seo)){
                Session::flash('danger_message', 'La descripción de la web es requerido para continuar');
                return redirect()->action([BlogController::class, 'create']);
            }

            if(empty($request->es_title)){
                Session::flash('danger_message', 'El titulo en español es requerido');
                return redirect()->action([BlogController::class, 'create']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([BlogController::class, 'create']);
            }

            $blog = new Blog();
            $blog->es_title = $request->es_title;
            $blog->es_description = $request->es_description;
            $blog->description_seo = $request->description_seo;
            $blog->url_seo = self::limpiarTexto($request->es_title);


            if(!empty($request->en_title)){
                $blog->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $blog->en_description = $request->en_description;
            }

            if(isset($request->imagen_principal)){
                $rutaImagenPrincipal=$request->imagen_principal->store("blog",'public');
                $blog->url_portada = "/storage/".$rutaImagenPrincipal;
            }

            if(isset($request->embed_video)){
                $embed_video=$request->embed_video;
                $blog->embed_video = $embed_video;
            }


            $blog->save();
            DB::commit();
            return redirect()->action([BlogController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([BlogController::class, 'create']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view('dashbboard.blogs.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        try {
            DB::beginTransaction();
            //CODIGO REQUERIDO
            if(empty($request->es_title)){
                Session::flash('danger_message', 'El titulo en español es requerido');
                return redirect()->action([BlogController::class, 'edit']);
            }

            if(empty($request->description_seo)){
                Session::flash('danger_message', 'La descripción de la web es requerido para continuar');
                return redirect()->action([BlogController::class, 'edit']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([BlogController::class, 'edit']);
            }

            $blog->es_title = $request->es_title;
            $blog->es_description = $request->es_description;
            $blog->description_seo = $request->description_seo;
            $blog->url_seo = self::limpiarTexto($request->es_title);

            if(!empty($request->en_title)){
                $blog->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $blog->en_description = $request->en_description;
            }

            if(isset($request->imagen_principal)){
                $rutaImagenPrincipal=$request->imagen_principal->store("blog",'public');
                $blog->url_portada = "/storage/".$rutaImagenPrincipal;
            }

            $blog->save();
            DB::commit();
            return redirect()->action([BlogController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([BlogController::class, 'edit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
