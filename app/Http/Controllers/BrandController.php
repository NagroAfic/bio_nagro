<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
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
        $brands = Brand::get();
        return view('dashbboard.brands.index')->with('brands',$brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashbboard.brands.create');
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
                return redirect()->action([BrandController::class, 'create']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([BrandController::class, 'create']);
            }

            if(empty($request->imagen_principal)){
                Session::flash('danger_message', 'El producto necesita una imagen');
                return redirect()->action([BrandController::class, 'create']);
            }

            $brand = new Brand();
            $brand->es_title = $request->es_title;
            $brand->es_description = $request->es_description;
            $brand->url_seo = self::limpiarTexto($request->es_title);
            $brand->description_seo = $request->description_seo;

            if(!empty($request->en_title)){
                $brand->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $brand->en_description = $request->en_description;
            }

            $rutaImagenPrincipal=$request->imagen_principal->store("brand",'public');
            $brand->url_image = "/storage/".$rutaImagenPrincipal;
            $brand->save();
            DB::commit();
            return redirect()->action([BrandController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([BrandController::class, 'create']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
        return view('dashbboard.brands.edit')->with('brand',$brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
        try {
            DB::beginTransaction();
            //CODIGO REQUERIDO
            if(empty($request->es_title)){
                Session::flash('danger_message', 'El titulo en español es requerido');
                return redirect()->action([BrandController::class, 'create']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([BrandController::class, 'create']);
            }

            $brand->es_title = $request->es_title;
            $brand->es_description = $request->es_description;
            $brand->url_seo = self::limpiarTexto($request->es_title);
            $brand->description_seo =$request->description_seo;

            if(!empty($request->en_title)){
                $brand->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $brand->en_description = $request->en_description;
            }

            if(isset($request->imagen_principal)){
                $rutaImagenPrincipal=$request->imagen_principal->store("brand",'public');
                $brand->url_image = $rutaImagenPrincipal;
            }

            $brand->save();
            DB::commit();
            return redirect()->action([BrandController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([BrandController::class, 'edit'],['brand'=>$brand]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
