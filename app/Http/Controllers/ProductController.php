<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $products = Product::leftJoin('brands','products.brand_id','=','brands.id')->leftJoin('categories','products.category_id','=','categories.id')
                            ->select('products.id','products.es_title','products.es_description','products.status as product_status','brands.es_title as brand_name','categories.es_title as category_name')->get();
        return view('dashbboard.products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        return view('dashbboard.products.create')->with('brands',$brands)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            //CODIGO REQUERIDO
            if(empty($request->es_title)){
                Session::flash('danger_message', 'El titulo en español es requerido');
                return redirect()->action([ProductController::class, 'create']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([ProductController::class, 'create']);
            }

            if(empty($request->imagen_principal)){
                Session::flash('danger_message', 'El producto necesita una imagen');
                return redirect()->action([ProductController::class, 'create']);
            }

            $product = new Product();
            $product->es_title = $request->es_title;
            $product->es_description = $request->es_description;
            $product->url_seo = self::limpiarTexto($request->es_title);
            $product->description_seo = $request->description_seo;
            $product->brand_id = $request->brand_id;
            if(!empty($request->en_title)){
                $product->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $product->en_description = $request->en_description;
            }

            if(!empty($request->video_youtube)){
                $product->embed_video = $request->video_youtube;
            }

            $rutaImagenPrincipal=$request->imagen_principal->store("producto",'public');
            $product->url_image = "/storage/".$rutaImagenPrincipal;
            $product->category_id = $request->category_id;
            $product->save();
            DB::commit();
            return redirect()->action([ProductController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([ProductController::class, 'create']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $brands = Brand::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        return view('dashbboard.products.edit')->with('product',$product)->with('brands',$brands)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $archivosCreados = [];
        try {
            DB::beginTransaction();
            //CODIGO REQUERIDO
            if(empty($request->es_title)){
                Session::flash('danger_message', 'El titulo en español es requerido');
            return redirect()->action([ProductController::class, 'edit'],['product',$product]);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([ProductController::class, 'edit'],['product',$product]);
            }

            // if(empty($request->imagen_principal)){
            //     Session::flash('danger_message', 'El producto necesita una imagen');
            //     return redirect()->action([ProductController::class, 'create']);
            // }

            $product->es_title = $request->es_title;
            $product->es_description = $request->es_description;
            $product->url_seo = self::limpiarTexto($request->es_title);
            $product->description_seo = $request->description_seo;
            $product->brand_id = $request->brand_id;
            if(!empty($request->en_title)){
                $product->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $product->en_description = $request->en_description;
            }

            if(!empty($request->video_youtube)){
                $product->embed_video = $request->video_youtube;
            }

            if(isset($request->imagen_principal)){
                $archivo = str_replace('/storage/', '', $product->url_image);
                Storage::disk('public')->delete($archivo);
                $rutaImagenPrincipal=$request->imagen_principal->store("producto",'public');
                $archivosCreados[] = $rutaImagenPrincipal;
                $product->url_image = "/storage/".$rutaImagenPrincipal;
            }

            $product->category_id = $request->category_id;
            $product->status = $request->status;

            $product->save();
            DB::commit();
            return redirect()->action([ProductController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            foreach ($archivosCreados as $archivo) {
                Storage::disk('public')->delete($archivo);
            }


            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([ProductController::class, 'edit'],['product',$product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
