<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController, App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\UploadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('home.home');
});
*/

Route::post('/uploaded',[UploadController::class,'upload'])->name('upload');
Route::get('/uploaded2',[UploadController::class,'upload2'])->name('upload2');

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/blog',[BlogController::class,'blog'])->name('blog');
Route::get('/post/{slug}',[BlogController::class,'post'])->name('post');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//categoría
Route::get("category/{slug}",[BlogController::class,'category'])->name("category");
Route::get("tag/{slug}",[BlogController::class,'tag'])->name("tag");

Route::middleware(["auth"])->group(function(){
    Route::resource("posts",PostController::class,[
        'names' => [
            'index' =>'posts.index',
            'create' =>'posts.create',
            'edit' => 'posts.edit'
        ]
    ]);
    Route::resource("tags",TagController::class,[
        'names' => [
            'index' =>'tags.index',
            'create' =>'tags.create',
            'edit' => 'tags.edit',
            'show' => 'tags.show'
        ]
    ]);
});

