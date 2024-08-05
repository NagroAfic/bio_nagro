<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
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
        $services = Service::get();
        return view('dashbboard.services.index')->with('services',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashbboard.services.create');
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
                return redirect()->action([ServiceController::class, 'create']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([ServiceController::class, 'create']);
            }

            $service = new Service();
            $service->es_title = $request->es_title;
            $service->es_description = $request->es_description;

            if(!empty($request->en_title)){
                $service->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $service->en_description = $request->en_description;
            }

            if(isset($request->imagen_principal)){
                $rutaImagenPrincipal=$request->imagen_principal->store("service",'public');
                $service->url_portada = "/storage/".$rutaImagenPrincipal;
            }

            if(isset($request->embed_video)){
                $embed_video=$request->embed_video;
                $service->embed_video = $embed_video;
            }


            $service->save();
            DB::commit();
            return redirect()->action([ServiceController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([ServiceController::class, 'create']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        try {
            DB::beginTransaction();
            //CODIGO REQUERIDO
            if(empty($request->es_title)){
                Session::flash('danger_message', 'El titulo en español es requerido');
                return redirect()->action([ServiceController::class, 'create']);
            }

            if(empty($request->es_description)){
                Session::flash('danger_message', 'La descripción en español es requerido');
                return redirect()->action([ServiceController::class, 'create']);
            }

            $service->es_title = $request->es_title;
            $service->es_description = $request->es_description;

            if(!empty($request->en_title)){
                $service->en_title = $request->en_title;
            }

            if(!empty($request->en_description)){
                $service->en_description = $request->en_description;
            }

            if(isset($request->imagen_principal)){
                $rutaImagenPrincipal=$request->imagen_principal->store("service",'public');
                $service->url_portada = "/storage/".$rutaImagenPrincipal;
            }

            $service->save();
            DB::commit();
            return redirect()->action([ServiceController::class, 'index']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('danger_message', 'Muestre al administrador del sistema el siguiente mensaje: '.$th->getMessage());
            return redirect()->action([ServiceController::class, 'edit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
