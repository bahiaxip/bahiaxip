<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
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
    public function index()
    {        
        return view('home');
    }

    public function home(){
        $posts=Posts::orderBy("id","desc")->where("status","PUBLISHED")->take(5)->get();
        $data = ['posts' => $posts];
        return view('home.home',$data);
    }
}
