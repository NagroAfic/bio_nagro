<?php

namespace App\Http\Controllers;

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
        
        return view('web.index')->with('page_traduction',$page_traduction)->with('servicios',$servicios);
    }

    public function services($lang)
    {
        $page_traduction = strtoupper($lang);
        $servicios = Service::where('status',1)->get();
        return view('web.services')->with('page_traduction',$page_traduction)->with('servicios',$servicios);;
    }


    public function service($lang,Service $service)
    {
        $page_traduction = strtoupper($lang);
        return view('web.es.servicios.index')->with('page_traduction',$page_traduction)->with('service',$service);
    }

    public function redirectToHome()
    {
        // Puedes definir un valor por defecto para lang
        $defaultLang = 'es';

        // Redirigir a la ruta 'home' con el idioma por defecto
        return redirect()->route('home', ['lang' => $defaultLang]);
    }
}
