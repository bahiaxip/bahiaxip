@extends("layouts.app")
@section("title","Blog")
@section("content")

<div class="container wrap_blog box_blog">
    <div class="div_search">
        <div class="input_search" >
        {{ Form::open(["route" => "blog","method" => "GET"]) }}
            
            {{ Form::text("search",null,[ "placeholder" => "Buscar...","class" => "no-autofill"]) }}
            <div class="icon_search">
                <button class="" type="submit">
                    {{--<button class="btn btn-sm" type="submit"><img src="{{asset('icon/magnifying-glass.svg')}}"></button>
                    --}}
                </button>
            </div>
        </div>
        
        {{ Form::close() }}
    </div>
    <!--<div class="col-md-offset-2">
        <h1>Lista de artículos</h1>
        
        @foreach($posts as $post)
        <div class="panel panel-default mt-2 p-2">
            <div class="panel-heading">
                {{ $post->title }}
            </div>
            <div class="panel-body ">
                @if($post->file)
                <img src="{{ $post->file }}" class="img-fluid" >
                @endif
                {{ $post->body }}
                <a href="{{ route("post",$post->slug) }}" class="float-right btn bg-primary text-white leermas">Leer Más</a>
            </div>            
        </div>
        @endforeach        
        {{-- $posts->render() --}}
    </div>-->
    <!--<div class="col-md-offset-2">-->
    <div class="div_blog">
        <div class="blog">
            <div class="div_title"  style="color:#D3D3D3;font-family:YoutubeB">
                @if($param)
                <span class="title_blog">Entradas 
                    <span>{{$param}}</span>
                </span>    
                @else
                    {{--@if(request()->page)
                    <span class="title_blog">Entradas página <span>{{request()->page}}</span></span>                    
                    @else
                    <span class="title_blog">Últimas entradas</span>
                    @endif
                    --}}
                    @if(request()->search)
                    <span class="title_blog">
                        Búsqueda de entradas: <span>{{request()->search}}</span>
                    </span>                    
                    @else
                    <span class="title_blog">Últimas entradas
                        @if(request()->page)
                        > Página {{request()->page}}
                        @endif
                    </span>

                    @endif
                @endif
            </div>
            <div class="div_title">
            @if($posts->total()==0)
            <div class="no_results">
                <h5 class="p-3">No se obtuvieron resultados</h5>
            </div>
             
            @endif
            </div>
            @php
                $i=0;
            @endphp
            
            @foreach($posts as $key => $post)
                <!--para que se visualice correctamente si se queda un post suelto
                    se ha creado un contador que cada número impar se añade un div "card-group" pero no se cierra y si es par no se crea pero se cierra, de esta forma se crea un div y cuando se ha creado el segundo div "card" se cierra el div "card-group" -->
                @if($i%2==0)
                <div class="card-group mtop16" >
                @endif
                    <div class="card border_card {{($key %2 == 0) ? 'even':'odd'}}" title="{{ $post->title }}">
                        {{--
                        <div class="card-header post_title" >                
                            <a href="{{route('post',$post->slug)}}">{{ $post->title }}</a>
                        </div>
                        --}}
                        <a href="{{ route('post',$post->slug) }}">
                        @if($post->file && $post->file != "NULL")
                                <div class="div_img">
                                <img src="{{ asset($post->file) }}" class="img-fluid img_posts">
                                </div>
                            
                        @endif
                        <!--<div class="card-block ">                
                            <div class="card-text mt-3 post_text">
                            {{ $post->body_main }}
                            <a href="{{ route('post',$post->slug) }}" class="float-right btn btn-sm leermas">Leer Más</a>
                            </div>
                        </div>-->
                        <div class="card-block  post_card_block">    
                            <span>
                                <h2 class="card-text post_text" data-hover="{{ $post->title }}" ></h2>
                            </span>
                        </div>
                        </a>
                    </div>
                @if($i%2!=0 || $key+1 == count($posts))
                </div>
                
                
                @endif
                
                @php
                $i++
                @endphp
            
            
            
            @endforeach
            
            
        </div>
        <aside class="aside" >
            <h2>Otras entradas</h2>
            <ul class="posts">
                @foreach($rand_posts as $rand_post)
                <li>
                    <a href="{{route('post',$rand_post->slug)}}" class="tag_button">
                        <div class="image_post">
                            <img src="{{asset($rand_post->file)}}" alt="" >
                            <span>{{$rand_post->title}}</span>
                        </div>
                        
                    </a>
                </li>
                
                @endforeach
                
            </ul>
            <ul class="tags">
                <h2>Etiquetas</h2>
                @foreach($tags as $t)
                <li>
                    <a href="{{route('tag',$t->slug)}}" class="tag_button"><span>{{$t->name}}</span></a>
                </li>
                
                @endforeach
                
            </ul>
        </aside>
    </div>
    {{-- para hacer los botones de páginas más pequeños podemos añadir la clase pagination-sm--}}
    <div class="box_pagination">
    {{-- Para establecer el mínimo de anchura añadimos el método onEachside(0) --}}
    {{ $posts->onEachSide(1)->links() }}
    </div>
    
</div>
@include('layouts.footer')
@endsection