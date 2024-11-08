<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Service;
use App\Mail\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $blogs = Blog::where('status',1)->get();
        $marcas = Brand::where('status',1)->get();
        $marcas_id = Brand::where('status',1)->pluck('id');
        $productos = Product::where('status',1)->select('id','brand_id','url_seo','es_title','en_title','url_image')->whereIn('brand_id',$marcas_id)->get();
        //return response()->json(["marcas_id" => $marcas_id,"productos"=>$productos], 200);

        return view('web.index')->with('page_traduction',$page_traduction)
                                ->with('marcas',$marcas)->with('productos',$productos)
                                ->with('blogs',$blogs)->with('servicios',$servicios);
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

    function product_home($lang,Product $product)  {
        $page_traduction = strtoupper($lang);
        $productos = Product::where('status',1)->select('id','brand_id','url_seo','es_title','en_title','url_image')->where('brand_id',$product->brand_id)->get();
        return view('web.product')->with('page_traduction',$page_traduction)->with('productos',$productos)->with('product',$product);
    }


    public function redirectToHome()
    {
        // Puedes definir un valor por defecto para lang
        $defaultLang = 'es';
        return redirect()->route('home', ['lang' => $defaultLang]);
    }


    public function contactoMail(Request $request){

        try {
            //code...
            $data = [
                "fullname" => $request->fullname,
                "idruc" => $request->idruc,
                "phone" => $request->phone,
                "email" => $request->email,
                "product_selected" => $request->product_selected,
                "unit" => $request->unit,
                "sales" => $request->sales
            ];

            Mail::to("josesaldanavi@gmail.com")->send(new Cotizacion($data));
        } catch (\Throwable $th) {
            //throw $th;
            info("ERROR MESSAGE MAIL :: NO SE PUDO ENVIAR EL CONTACTO POR CORREO ELECTRONICO");
        }
        return redirect()->action([HomeController::class, 'index'],['lang' => $request->lang]);
    }


}
