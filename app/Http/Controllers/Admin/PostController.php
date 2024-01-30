<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Posts, App\Models\Category,App\Models\Tag, App\Models\Ima_post
;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{

    public function __construct(){
        //$this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=auth()->user()->id;
        //$user=User::find($i)->roleuser->role_id;
        $user = Auth::id();
        //comprobamos si es admin para dar acceso a todas las entradas
        if(auth()->user()->role=='active')//1 es Admin
        {
            $posts = Posts::orderBy("id","DESC")->paginate(10);
        }
        else
        {
        //si el usuario no es admin solo tiene acceso a sus propias entradas
            $posts = Posts::orderBy("id","DESC")
                ->where("user_id",auth()->user()->id)
                ->paginate(10);            
        }
        return view("admin.posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("name","ASC")->pluck("name","id");
        $tags = Tag::orderBy("name","ASC")->get();
        $url=env("APP_URL","localhost");
        $post='';
        $url = null;
        // con $id hacemos una consulta mysql y obtenemos el próximo id de la tabla indicada
        //$id=DB::select('SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA= "mundaxip_com_db" AND TABLE_NAME ="posts" ');
        //$post=$id[0]->AUTO_INCREMENT;

        //ventana de aviso de cookies
            //$post=(object) array("id"=>null);
        //borramos sesión para la creación de un nuevo post, por si el mismo usuario ya ha creado otro post y .
            //session()->forget("id_images");
        
            //$img_sesion=session()->put("aviso",true);
        return view("admin.posts.create",compact("categories","tags","post","url"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Posts::create($request->all());
        //dd($post);
        //if($request->post
        $email=auth()->user()->email;
        //dd($email);exit;
        /*
        Mail::to("mangergormiti@gmail.com","manger")
                ->send(new Approve($post));
        */


        //IMAGE
        //se crea el directorio aunque no se suba imagen, es necesario por si luego en la edición se añade imagen
        if(!is_dir("image/post/")){               
            if(!mkdir("image/post/main",0777)){
                dd("no se pudo crear el directorio");
            }
        }
        //si se añade imagen principal, se sube al directorio main y se asigna a la db
        if($request->file("file"))
        {
            //si no existe directorio con el mismo nombre del correo se crea
            //comprobar con is_dir
            /*if(is_dir("image/".$email)){
                dd("wow");
            }*/
            //if(!file_exists("image/".$email)){ 
            //se crea el directorio con el id del post y el directorio main               
                     
            $path = Storage::disk("public")->put("image/post/main",$request->file("file"));            
            $post->fill(["file" => $path])->save();
            /*$ima_post = Ima_post::create([
               "title" => $post->title,
                "path" => asset($path),
                "post_id" => $post->id
            ]);*/
        }
        
        //TAGS
        $post->tags()->attach($request->get("tags"));
        //id_images contiene el valor true si se han subido imágenes en body_plus
        if($request->session()->get("id_images"))
        {
            //$idsimage= explode(",",$request->get("postId"));
            $idsimage = session()->get("id_images");
            
            foreach($idsimage as $image)
            {
                //Actualizamos el post_id de las imágenes que se han subido en base64 
                Ima_post::where("id",$image)->update(["post_id"=>$post->id]);
            }
        }
        
        //quizás debamos borrar session id_images


        //mandamos email
        
        
        return redirect()->route("posts.edit",$post->id)
                ->with("info","Entrada creada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //comprobamos si es admin para dar acceso a todas las entradas
        
        
        $post = Posts::find($id);
        //if(!auth()->user()->isAdmin())
            //$this->authorize("pass", $post);        
        return view("admin.posts.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //comprobamos si es admin para dar acceso a todas las entradas
        $post = Posts::find($id);
        //if(!auth()->user()->isAdmin())
            //$this->authorize("pass", $post);        
        
        $categories = Category::orderBy("name","ASC")->pluck("name","id");
        $tags = Tag::orderBy("name","ASC")->get();
        
        return view("admin.posts.edit",compact("post", "categories","tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //dd(Storage::disk("public"));
        //comprobamos si es admin para dar acceso a todas las entradas
        $post = Posts::find($id);
        //si existe imagen almacenamos la ruta de la imagen anterior en una variable
        if(isset($post->file) && $post->file!=null){            
            $lastFile=$post->file;
        }
        //dd($request->statusint);
        //if(!auth()->user()->isAdmin())
            //$this->authorize("pass",$post);
        //$prueba=$request->input("body");
        //ruta con directorio con nombre del correo del usuario 
        $email=auth()->user()->email;
        
        $post->fill($request->all())->save();
        
        //dd($lastFile);
        /*if($post->file && $post->file!=""){
            echo "ola";exit;
        }*/
        if($request->file("file"))
        {

            //eliminamos el archivo anterior que se haya subido de la imagen principal (main)
                //escaneamos el directorio uploads en búsqueda de archivos

            //comprobamos si existen archivos en el directorio y eliminamos en caso afirmativo
            //si existen archivos en el directorio main del usuario se eliminan


            //condición para eliminar todas las imágenes de un directorio
            /*
            if($carpeta=@scandir("image/post/main")){

                $mask="image/post/main/*.*";                
                    //con glob creamos un array
                    array_map("unlink",glob($mask));      
                    //dd(glob($mask));
            }
            */
            //si existía imagen la eliminamos para no cargar el servidor de imágenes inservibles
            if(isset($lastFile)){
                //si no es capaz de borrar esa imagen (pk no existe) podemos mandar algún mensaje
                //if(!unlink($lastFile)){
                if(file_exists($lastFile)) unlink($lastFile);
                    /*{
                    //mensaje
                    return redirect()->route("posts.edit", $post->id)
                    ->with("info", "la entrada se ha actualizado correctamente222");
                }*/
                
            }
            //se añade la nueva imagen
            $path = Storage::disk("public")->put("image/post/main",$request->file("file"));
            $post->fill(["file" => $path])->save();
            /*$ima_post = Ima_post::create([
               "title" => "hola",
                "detail" => "ima-chicago",                
                "path" => asset($path),
                "post_id" => $post->id
            ]);*/
        }
        //TAGS
        $post->tags()->sync($request->get("tags"));
        
        return redirect()->route("posts.edit", $post->id)
                ->with("info", "la entrada se ha actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {       
        if($request->ajax())
        {   
            
            $post = Posts::find($id);
            
                        //if(!auth()->user()->isAdmin())
                            //$this->authorize("pass",$post);            
            //eliminamos la imagen  principal del post
    
            if($post->file){
                if(file_exists($post->file))
                    unlink($post->file);  
            } 
            $img_to_delete=Ima_Post::where("post_id",$post->id)->get();
        //return $img_to_delete;
            //$cuenta=count($img_to_delete);
            
            if(!$img_to_delete->isEmpty()){
                foreach ($img_to_delete as $item ) {
                    //delete db
                    $item->delete();
                    //delete server
                    if(file_exists($item["path"])){
                        unlink($item["path"]);
                        //unlink(asset($item["path"]));         
                    }
                }
            }
            //delete post
            $post->delete();
            return response()->json([
                //"total" => $totalposts,                
                "post" => $post,                
                "message" => $post->title." fue eliminado correctamente "
            ]);
        }
    }
}
