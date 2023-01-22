<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_name" content={{ Route::currentRouteName() }}>
    <meta name="cookieBX" content="{{get_cookies() }}">
    <link rel="shortcut icon" href="{{asset('ima/logo_BX_verdex200.png')}}" />
    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>@yield('title')</title>


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
    <!-- awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/8588bc45a2.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cookies.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}
    {{--<script src="{{asset('js/script.js')}}"></script>--}}
    {{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    --}}

</head>
<body>

    <!-- fondo al abrir el menú principal en bajas resoluciones -->
    <div id="back_menu" class="back_menu"></div>
    @include('layouts.cookie_notice')
    <div id="latleft_oculto" class="hidden_menu  ">
        @include('layouts.hidden_nav')
        
    </div>    
    <div id="app">
        <!--
        <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="height:80px;display:flex;margin:auto;justify-content:center;background-color:rgba(0,0,0,.8)">
            <img src="{{asset('ima/logo_bahiaxip_Nborde.png')}}" alt="" height="60">
            bahiaxip
        </nav>
        -->
        @include('layouts.nav')
        

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

        <main class="main">
            @if(Route::currentRouteName() != 'post')
            <div class="btn_floatup" onclick="up()">        
                {{--<i class="fa-solid fa-circle-arrow-up"></i>--}}
                <div class="circle">
                    <span class="arrow">&#x02191;</span>
                </div>
            </div>
            @endif
            @yield('content')
        </main>

    </div>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NZ971N59M7"></script>
<script>
  
</script>
    <script>
        /*function configCookies(){
            let divCookies = document.querySelector('.div_cookies');
            if(divCookies.style.display == "block"){
                divCookies.style.display = 'none'
            }else{
                divCookies.style.display = 'block'
            }
            
        }*/
        

        

        
        
        
        
        
        
    
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
    <script src="{{asset('js/carousel_slides.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>

    <script src="{{asset('js/animation_gsap.js')}}"></script>
    <!-- cookies -->
    <script src="{{asset('js/cookies.js')}}"></script>
    @yield('scripts')
</body>
</html>
