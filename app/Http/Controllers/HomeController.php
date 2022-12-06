<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
//Necesario para obtener cookies (con el método1 sin helper request())
//use Request as OtroRequest;
//Necesario para crear obtener cookies(con el método2)
//use Cookie;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    

    public function __construct(Request $request)
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   


        return view('home');
    }
    /*

    Para añadir al layout el script de Analytics es necesario añadir el parámetro consent con 
    las distintas keys y su valor tal como indica en la página de Google Analytics:
    https://developers.google.com/tag-platform/devguides/consent
    Ejemplo de añadir las keys y su valor por defecto, que pueden ser "denied" o "granted",
    // Default ad_storage to 'denied'.
      gtag('consent', 'default', {
        'ad_storage': 'denied'
      });
    Después al aceptar el modal de consentimiento de cookies de terceros se puede actualizar
    mediante una función que se muestra tb en la url indicada anteriormente y se añade el tipo, que
    ya no sería default sino update y las keys con sus valores:
    function consentGranted() {
        gtag('consent', 'update', {
          'ad_storage': 'granted'
        });
    }
    Se puede ver en la siguiente url que existen otras keys como analytics_storage y wait_for_update,
    además de la mostrada en la función(ad_storage), y que sus valores pueden ser allowed o denied,
    sería necesario revisar si allowed es equivalente a granted:
    https://developers.google.com/tag-platform/gtagjs/reference#consent

    */
    public function home(Request $request){
        /*
        if($request->cookie('bahiaxip_analytics')){
            $cookie = $request->cookie('bahiaxip_analytics');
        }
        */
        
        
        
        
        
        $posts=Posts::orderBy("id","desc")->where("status","PUBLISHED")->take(6)->get();
        //$data = ['posts' => $posts];
        $data = ['posts' => $posts];
        //creando cookies -> método1 con vista
        //return response(view('home.home',$data))->cookie('Cookie1','micookie',50);
        //creando cookies -> método 2
        //Cookie::queue('Cookie2','micookie2',60);
        //Obteniendo cookies método1
        //return request()->cookie('Cookie2');
        //Obteniendo cookies método1 sin helper request()
        //return OtroRequest::cookie('Cookie2');
        //Obteniendo cookies método2
        //return OtroRequest::cookie('Cookie2');
        //return Cookie::get('Cookie2');
        /*
        if(Cookie::get('bahiaxip_session')){
            //return Cookie::get('bahiaxip_session');
            return Cookie::get();
        }
        if(Cookie::get('Cookie2') == 'micookie2'){
            return "existe";
        }else{
            return "NO existe";
        }
        */
        return view('home.home',$data);
    }

    public function contact(){
        return view('home.contact');
    }
}
