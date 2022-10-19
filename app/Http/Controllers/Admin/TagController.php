<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id=auth()->user()->id;
        //$user=User::find($i)->roleuser->role_id;
        $user = Auth::user();
        //comprobamos si es admin para dar acceso a todas las entradas
        if(auth()->user()->code=='active')//1 es Admin
        {
            $tags = Tag::where('status','PUBLISHED')->paginate(10);
        }else{
            $tags = Tag::where('status','PUBLISHED')->where('user_id',$user->id)->paginate(10);
        }
        $data = ['tags' => $tags];
        return view('admin.tags.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tags.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
                
        return redirect()->route("tags.index",$tag->id)
                ->with("info","Etiqueta creada con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view("admin.tags.show",compact("tag"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view("admin.tags.edit",compact("tag"));
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
        $tag = Tag::find($id);
        $tag->fill($request->all())->save();
        return redirect()->route("tags.edit",$tag->id)
                ->with("info","Etiqueta actualizada con éxito");
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
            $tag = Tag::find($id);
            
            //if(!auth()->user()->isAdmin())
                //$this->authorize("pass",$tag);
            $tag->delete();
            //$totalposts= Posts::all()->count();
            
            return response()->json([
                //"total" => $totalposts,
                "tag" => $tag,
                "message" => $tag->name." fue eliminado correctamente",
            ]);
        }
    }
}
