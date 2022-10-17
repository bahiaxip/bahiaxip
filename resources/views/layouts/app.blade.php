<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_name" content={{ Route::currentRouteName() }}>
    <link rel="shortcut icon" href="{{asset('ima/logo_BX.png')}}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('js/functions.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- styles highlight -->
    <link rel="stylesheet" href="{{url('ckeditor/plugins/codesnippet/lib/highlight/styles/sunburst.css')}}">
    <script src="{{url('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')}}"></script>
    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bx_nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Bahiaxip') }}
                    {{--<img src="{{asset('ima/logo_bahiaxip.png')}}" alt="" height="30" >--}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse bx_navbar" id="navbarSupportedContent " style="">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto links" >
                        <li>
                            <a href="/" class="nav-link @if(Route::currentRouteName() == 'home') {{'active'}}@endif">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="/blog" class="nav-link @if(Route::currentRouteName() == 'blog' || Route::currentRouteName() == 'post') {{'active'}}@endif">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="/" class="nav-link @if(Route::currentRouteName() == 'contact') {{'active'}}@endif">
                                Contacto
                            </a>
                        </li>
                        <li>
                            <a href="/" class="nav-link @if(Route::currentRouteName() == 'category') {{'active'}}@endif">
                                Login
                            </a>
                        </li>
                        @admin('active')
                        <li>
                            <a href="{{asset('/posts')}}" class="nav-link @if(Route::currentRouteName() == 'posts.index'
                                ||Route::currentRouteName() == 'posts.index'
                                ||Route::currentRouteName() == 'posts.create'
                                ||Route::currentRouteName() == 'posts.edit'
                                ) {{'active'}}@endif">
                                Entradas
                            </a>
                        </li>
                        @endadmin
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto nav_user">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() == 'login') {{'active'}} @endif" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">    
                                <a class="nav-link @if(Route::currentRouteName() == 'register') {{'active'}} @endif" href="{{ route('register') }}">
                                    {{ __('Registro') }}
                                </a>
                            </li>                                
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar session') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>
    <!-- ventana modal confirmación eliminar registros de admin-->
        <div class="modal fade"  id="modal-delete" role="dialog" aria-labelledby="modal-delete" >
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title ">
                            <h5>Desea eliminar el registro?</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col text-center">
                                <button class="btn btn-primary" data-bs-dismiss="modal" >Cancelar</button>
                                <button class="btn btn-primary" id="on-delete">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session("info"))
        <!--<div class="container">-->

            <div class="row">
                <div class="col-md-12 ">
                    <div class="alert alert-success">
                        {{ session("info") }}
                    </div>
                </div>
            </div>
        <!--</div>-->
        @endif

        @if(count($errors))
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>                                        
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <main class="">
            @yield('content')
        </main>
    </div>
    <script>
    
        //eliminar con modal 
    
        function confirm(e,id){
            e.preventDefault();
            
            
            var btnselec=$(id);                
            $("#modal-delete").modal("show");
            var row = btnselec.parents("tr");                  
                var form = btnselec.parents("form");
                var url = form.attr("action");
                //es necesario el one ya que con click y on se va incrementando el clic y da error
            $("#on-delete").one("click",function(e)
            //$("#on-delete").click(function()
            {

                //e.stopImmediatePropagation();
                $("#alert").show();
                //console.log(form.serialize());return;
                $.post(url,form.serialize(),function(result)
                {                        
                    
                    $("#modal-delete").modal("hide");
                    row.fadeOut();
                    $("#alert").html(result.message);
                    
                //bloque anulado
                //en lugar de eliminar por comparación
                //se eliminan por id_post en PostController


                /*
                    //recogemos la propiedad body_plus que trae post de la petición ajax anterior
                    let bodyPlus = result.post.body_plus;
                //se llama al método bodyPlus que obtiene un array de imagenes a partir de la cadena pasada como parámetro y las alamacena en la global srcSumer                         
                    let imgsToDelete = listImgSumer(bodyPlus);
                //imaËliminada compara 2 arrays y elimina del servidor las que ya no estén presentes en el nuevo array mediante la misma petición ajax anterior
                    rmImapost(imgsToDelete,"[]",root);
                    //de esta forma se eliminan tb las imágenes del servidor que estaban en el textarea body_plus para no dejar restos de imágenes en el servidor.
                */
                }).fail(function()
                {
                    $("#alert").html("Algo salió mal");
                });
            });
        }

        //mostrar el hightlight de los posts (necesario css y js en layout).
        //Busca los <pre><code>...</code></pre> y establece los estilos
        //https://highlightjs.org/usage/
        hljs.initHighlightingOnLoad();
        

        
    </script>
    @yield('scripts')
</body>
</html>
