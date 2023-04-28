<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tag;
use Cookie;

class BlogController extends Controller
{

    public function blog(Request $request){
        // si existe $_GET['search'] buscará por search si no, search se 
        //tomará como null y buscará todos
        $posts= Posts::search($request->get("search"))->orderBy("id","DESC")->where("status","PUBLISHED")->paginate(6)->appends($request->query());
        $tags = Tag::where('status','PUBLISHED')->get()->random(5);
        $rand_posts = Posts::where('status','PUBLISHED')->get()->random(4);
        $data = ['posts'=> $posts,'tags' => $tags,'rand_posts'=> $rand_posts,'param' => false];
        
        return view('blog.blog',$data);
    }
    public function post($slug)
    {   
        $post=Posts::where("slug",$slug)->first();
        /*
        $comment=Comment::orderBy("id","ASC")->where("post_id",$post->id)->where("status","PUBLISHED")->get();        
        $notification=Comment::orderBy("id","DESC")->where("post_id",$post->id)->where("status","PUBLISHED")->get();
        */
        
        return view("blog.post",compact("post"));
    }

    public function category($slug)
    {
        $category= Category::where("slug",$slug)->pluck("id")->first();
        $posts= Posts::where("category_id",$category)->orderBy("id","DESC")->where("status","PUBLISHED")->paginate(6);
        $tags = Tag::where('status','PUBLISHED')->get()->random(5);
        $rand_posts = Posts::where('status','PUBLISHED')->get()->random(5);
        $param = $slug;
        return view("blog.blog",compact("posts","tags","rand_posts",'param'));
    }
    
    public function tag($slug)
    {
        $posts = Posts::whereHas("tags",function($query) use ($slug)
        {
            $query->where("slug",$slug);   
        })      
        ->orderBy("id","DESC")->where("status","PUBLISHED")->paginate(6);
        $tags = Tag::where('status','PUBLISHED')->get()->random(5);
        $rand_posts = Posts::where('status','PUBLISHED')->get()->random(5);
        $param = $slug;
        return view("blog.blog",compact("posts","tags","rand_posts",'param'));
    }
//función ajax de gestión de cookies
    public function cookies(Request $request){  
        if($request->post('bahiaxip')){
            //datos en minutos para el helper cookie de Laravel
            //provisionalmente establecemos una semana en lugar de un año.
            $ano = 10080;
            $bxcookie = cookie('bx','true',$ano);
            return response(['status' => '200','msge' => 'La cookie recordatorio ha sido activada'])->withCookie($bxcookie);
        }      
        if($request->post('analytics') && $request->post('type')){
            //provisionalmente establecemos una semana en lugar de un año.
            //datos en minutos para el helper cookie de Laravel
            $ano = 10080;
            $type = $request->post('type');

            
            $cookie_analytics = $request->cookie('bahiaxip_analytics');
            //return response(['dato' => $cookie_analytics]);
            if($request->post('analytics')){
                $new_value = $request->post('analytics');
                if($type == 'all'){
                    //si el parámetro es all (activar todas) establecemos a true
                    $micookie = cookie('bahiaxip_analytics','true',$ano);
                    return response(['status' => '200','msge' => 'Todas las cookies han sido activadas','value' => $new_value])->withCookie($micookie);
                }
                if($new_value == 'false' && $cookie_analytics == 'false' 
                    || $new_value == 'false' && !$cookie_analytics){
                    return response(['status' => '200','msge' => 'No es necesario actualizar la cookie','value' => $new_value]);
                }
                elseif($new_value == 'false' && $cookie_analytics == 'true'){
                    //eliminamos cookie
                    $rm_cookie = Cookie::forget('bahiaxip_analytics');
                    return response(['status' => '200','msge' => 'La cookie ha sido desactivada','value' => $new_value])->withCookie($rm_cookie);
                }else{
                    //creamos o actualizamos cookie
                    $micookie = cookie('bahiaxip_analytics',$new_value,$ano);
                    return response(['status'=>'200','msge' => 'La cookie ha sido actualizada a : $new_value ','value' => $new_value])->withCookie($micookie);
                }
                
                
            }
            //comprobamos si el valor de la cookie
            /*if($request->cookie('bahiaxip_analytics') == 'true'){
                $b_analytics = $request->cookie('bahiaxip_analytics');
                //comprobamos si existe valor por el formulario
                if($request->post('analytics')){

                    $new_value = $request->post('analytics');
                    //comparamos si el valor nuevo es igual o distinto de el 
                    //que ya estaba establecido en la cookie, si es igual
                    //lo dejamos, podríamos reiniciar el año, si no es igual
                    //establecemos la nueva cookie
                    if($new_value === 'undefined'){
                        $new_value = 'false';
                    }
                    if($new_value != $b_analytics){
                        $micookie = cookie('bahiaxip_analytics',$new_value,$ano);
                        //echo "la cookie: ".$b_analytics." tiene un valor distinto que el input: ".$new_value."<br>";
                        return response()->json(['dato','es distinto'])->withCookie($micookie);
                    }else{
                        $micookie = $b_analytics;
                        //echo "la cookie: ".$b_analytics." tiene el mismo valor que el input ".$new_value."<br>";
                        return response()->json(['dato','es el mismo'])->withCookie($micookie);
                    }
                }    
            }else{
                //$b_analytics = $request->cookie('bahiaxip_analytics');
                $micookie = cookie('bahiaxip_analytics','true',$ano);
                return response()->json(['dato','midato'])->withCookie($micookie);
            }*/
            //return response()->json(['dato','midato'])->withCookie($micookie);
                
            
            // }else{
            //     $rm_cookie = Cookie::forget('bahiaxip_analytics');
            //     return response()->json(['hola' => 'bien'])->withCookie($rm_cookie);
            // }
            
        }else{
            //devolvemos mensaje de error
            return response(['error',"Se originó un error durante la administración de cookies (function cookies())"]);
        }
    }
}
