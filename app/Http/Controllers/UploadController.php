<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL,Auth;
class UploadController extends Controller
{
    public $email;
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function upload(Request $request) {
        
        $this->create_dir_user();

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $filename = time().'.'.$request->upload->extension();
        $request->upload->move(public_path('upload/posts/'.$this->email.'/'), $filename);
            return response()->json([
                'uploaded' => 1,
                'fileName' => $request->upload->getClientOriginalName(),
                'url' => URL::asset('upload/posts/'.$this->email.'/'.$filename)
            ]);
    }
    public function create_dir_user(){
        //almacenamos email del usuario
        $this->email = Auth::user()->email;
        //creamos directorios si no existen
        if(!is_dir('upload/posts'))
            mkdir('upload/posts');

        if(!is_dir('upload/posts/'.$this->email))
            mkdir('upload/posts/'.$this->email);
    }
    
}
