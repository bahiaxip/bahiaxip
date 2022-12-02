<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{

    public function blog(Request $request){
        // si existe $_GET['search'] buscará por search si no, search se 
        //tomará como null y buscará todos
        $posts= Posts::search($request->get("search"))->orderBy("id","DESC")->where("status","PUBLISHED")->paginate(6)->appends($request->query());
        $tags = Tag::where('status','PUBLISHED')->get()->random(5);
        $rand_posts = Posts::where('status','PUBLISHED')->get()->random(5);
        $data = ['posts'=> $posts,'tags' => $tags,'rand_posts'=> $rand_posts];
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
        return view("blog.blog",compact("posts","tags","rand_posts"));
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
        
        return view("blog.blog",compact("posts","tags","rand_posts"));
    }
}
