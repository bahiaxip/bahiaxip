@extends("layouts.app")
@section("title","Blog")
@section("sidebar-bar")
    @parent
    <div class=" d-lg-none" id="sidebar-bar">
        {{ Form::open(["route" => "blog","method" => "GET"]) }}
        <input type="text" name="search" class = "" placeholder = "Buscar..." autocomplete="off" >
        <button type="submit" class="boton_sidebar-bar" value=""></button>
                   
        {{ Form::close() }}
    </div>
@endsection
@section("sidebar")
    @parent
    
    <ul class="d-none d-lg-flex navbar-nav mr-2 sidebar_nav ">
        <li class="nav-item" >
        {{ Form::open(["route" => "blog","method" => "GET","class" => "card card-sm"]) }}
            <div class="col-auto">
            {{ Form::text("search",null,["class" => "form-control form-control-sm form-control-borderless", "placeholder" => "Buscar..."]) }}
            </div>
        </li>
        <li class="">
            <div class="col-auto">
                <button class="btn btn-sm " type="submit"><img src="{{asset('./ima/lupa_10.png')}}"></button>
            </div>
        {{ Form::close() }}
        </li>
    </ul>
    
@endsection
@section("content")

<div class="container box_blog">
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
        <div class="blog" >
            @if($posts->total()==0)
            <div class="col text-center mt-4">
                <h5 class="alert-danger p-3">No se obtuvieron resultados</h5>
            </div>
             
            @endif
            @php
                $i=0;
            @endphp
            
            @foreach($posts as $key => $post)
                <!--para que se visualice correctamente si se queda un post suelto
                    se ha creado un contador que cada número impar se añade un div "card-group" pero no se cierra y si es par no se crea pero se cierra, de esta forma se crea un div y cuando se ha creado el segundo div "card" se cierra el div "card-group" -->
                @if($i%2==0)
                <div class="card-group mtop16" >
                @endif
                    <div class="card border_card {{($key %2 == 0) ? 'even':'odd'}}">
                        {{--
                        <div class="card-header post_title" >                
                            <a href="{{route('post',$post->slug)}}">{{ $post->title }}</a>
                        </div>
                        --}}
                        @if($post->file && $post->file != "NULL")
                            <a href="{{ route('post',$post->slug) }}">
                                <img src="{{ asset($post->file) }}" class="img-fluid img_posts">
                            </a>
                        @endif
                        <!--<div class="card-block ">                
                            <div class="card-text mt-3 post_text">
                            {{ $post->body_main }}
                            <a href="{{ route('post',$post->slug) }}" class="float-right btn btn-sm leermas">Leer Más</a>
                            </div>
                        </div>-->
                        <div class="card-block  post_card_block">                
                            <div class="card-text post_text">
                            {{ $post->body_main }}                        
                            </div>
                        </div>
                    </div>
                @if($i%2!=0 || $key+1 == count($posts))
                </div>
                
                
                @endif
                
                @php
                $i++
                @endphp
            
            
            
            @endforeach
            
            
        </div>
        <div style="width:30%">
            asdfasdf
        </div>
    </div>
    {{ $posts->links() }}
</div>
@endsection