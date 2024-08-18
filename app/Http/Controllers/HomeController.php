<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($lang)
    {
        $page_traduction = strtoupper($lang);
        $servicios = Service::where('status',1)->get();
        $marcas = Brand::where('status',1)->get();
        $marcas_id = Brand::where('status',1)->pluck('id');
        $productos = Product::where('status',1)->select('id','brand_id','url_seo','es_title','en_title','url_image')->whereIn('brand_id',$marcas_id)->get();
        //return response()->json(["marcas_id" => $marcas_id,"productos"=>$productos], 200);

        return view('web.index')->with('page_traduction',$page_traduction)->with('marcas',$marcas)->with('productos',$productos)->with('servicios',$servicios);
    }

    public function services($lang)
    {
        $page_traduction = strtoupper($lang);
        $servicios = Service::where('status',1)->get();
        return view('web.services')->with('page_traduction',$page_traduction)->with('servicios',$servicios);
    }

    public function brands($lang)
    {
        $page_traduction = strtoupper($lang);
        $servicios = Service::where('status',1)->get();
        return view('web.brand')->with('page_traduction',$page_traduction)->with('servicios',$servicios);
    }

    public function service($lang,Service $service)
    {
        $page_traduction = strtoupper($lang);
        $servicios = Service::where('status',1)->get();
        return view('web.es.servicios.index')->with('page_traduction',$page_traduction)->with('service',$service)->with('servicios',$servicios);
    }

    public function redirectToHome()
    {
        // Puedes definir un valor por defecto para lang
        $defaultLang = 'es';
        return redirect()->route('home', ['lang' => $defaultLang]);
    }
}
