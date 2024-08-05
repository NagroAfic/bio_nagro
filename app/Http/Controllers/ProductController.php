<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::leftJoin('brands','products.brand_id','=','brands.id')
                            ->select('products.es_title','products.es_description','products.status as product_status','brands.es_title as brand_name')->get();
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
        return view('dashbboard.products.create')->with('brands',$brands);
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
            $product->url_image = $rutaImagenPrincipal;
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
