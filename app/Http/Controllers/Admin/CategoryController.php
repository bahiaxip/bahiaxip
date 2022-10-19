<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $user = Auth::user();
        //comprobamos si es admin para dar acceso a todas las entradas
        if(auth()->user()->code=='active')//1 es Admin
        {
            $categories = Category::paginate(10);
        }else{
            $categories = Category::where('user_id',$user->id)->paginate(10);
        }
        $data = ['categories' => $categories];
        return view('admin.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = Category::create($request->all());
                
        return redirect()->route("categories.index",$cat->id)
                ->with("info","Categoría creada con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::find($id);
        $data = ['cat' => $cat];
        return view("admin.categories.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);

        return view("admin.categories.edit",compact("cat"));
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
        $cat = Category::find($id);
        $cat->fill($request->all())->save();
        return redirect()->route("categories.edit",$cat->id)
                ->with("info","Categoría actualizada con éxito");
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
            $cat = Category::find($id);
            
            //if(!auth()->user()->isAdmin())
                //$this->authorize("pass",$tag);
            $cat->delete();
            //$totalposts= Posts::all()->count();
            
            return response()->json([
                //"total" => $totalposts,
                "cat" => $cat,
                "message" => $cat->name." fue eliminado correctamente",
            ]);
        }
    }
}
