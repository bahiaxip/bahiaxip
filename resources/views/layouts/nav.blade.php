
<nav class="navbar navbar-expand-md navbar-light shadow-sm bx_nav" style="font-family: Usuzi;">

    <div class="container">
        <ul class="navbar-nav me-auto">
            <!-- cubo -->
            <li>
                <a class="nav-link .cubo" onclick="pausar()" onmousemove="showPlay()" onmouseout="hidePlay()" style="font-family:QuicksandB;font-size:16px;display:flex;margin:auto;cursor:pointer" title="Pausar/Reanudar">
                    @include('layouts.cube')
                    
                </a>
            </li>
            <!-- logo pequeño Bahiaxip -->
            <li>
                <a class="nav-link logo" href="{{ route('home') }}"  >
                    <h5>{{ config('app.name', 'Bahiaxip') }}</h5>
                </a>
            </li>
            
            {{--
            <img src="{{asset('ima/logo_BX_trans.png')}}" alt="" width="50">
            --}}
            {{--<img src="{{asset('ima/logo_BX_Nborde.png')}}" alt="" height="40">--}}
                
            
            
            {{--<img src="{{asset('ima/logo_bahiaxip.png')}}" alt="" height="30" >--}}
        </ul>
        <!-- botón oculto responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon" style="color:white"></span>
        </button>
        {{-- botón oculto responsive --}}
        <div class="collapse navbar-collapse bx_navbar" id="navbarSupportedContent " style="">
            <!-- Enlaces -->
        
            <ul class="navbar-nav me-auto links" >
                <li>
                    <a href="{{route('home')}}" class="nav-link @if(Route::currentRouteName() == 'home') {{'active'}}@endif">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{route('blog')}}" class="nav-link @if(Route::currentRouteName() == 'blog' || Route::currentRouteName() == 'post') {{'active'}}@endif">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{route('contact')}}" class="nav-link @if(Route::currentRouteName() == 'contact') {{'active'}}@endif">
                        Contacto
                    </a>
                </li>
                
                <li>
                    <a href="{{route('projects')}}" class="nav-link @if(Route::currentRouteName() == 'projects') {{'active'}}@endif">
                        Proyectos
                    </a>
                </li>
                
                @admin('active')
                <li class="links_admin d-none d-lg-block">
                    <a href="{{asset('/posts')}}" class="nav-link @if(Route::currentRouteName() == 'posts.index'
                        ||Route::currentRouteName() == 'posts.index'
                        ||Route::currentRouteName() == 'posts.create'
                        ||Route::currentRouteName() == 'posts.edit'
                        ) {{'active'}}@endif">
                        Entradas
                    </a>
                </li>
                @endadmin
                @admin('active')
                <li class="links_admin d-none d-lg-block">
                    <a href="{{asset('/categories')}}" class="nav-link @if(Route::currentRouteName() == 'categories.index'
                        ||Route::currentRouteName() == 'categories.index'
                        ||Route::currentRouteName() == 'categories.create'
                        ||Route::currentRouteName() == 'categories.edit'
                        ) {{'active'}}@endif">
                        Categorías
                    </a>
                </li>
                @endadmin
                @admin('active')
                <li class="links_admin d-none d-lg-block">
                    <a href="{{asset('/tags')}}" class="nav-link @if(Route::currentRouteName() == 'tags.index'
                        ||Route::currentRouteName() == 'tags.index'
                        ||Route::currentRouteName() == 'tags.create'
                        ||Route::currentRouteName() == 'tags.edit'
                        ) {{'active'}}@endif">
                        Etiquetas
                    </a>
                </li>
                @endadmin
            </ul>

            <!-- Right Side Of Navbar -->
            
            <ul class="navbar-nav ms-auto nav_user">
                <!-- no es el efecto deseado...
                <div class="box_canvas">
                    <canvas id="canvas1" class="canvas1"></canvas>    
                </div>
                -->
                
                @include('layouts.links_login')


                <!-- Enlaces login y registro -->
                {{--
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
                --}}
            </ul>
            
        </div>
        {{--
        <div class="collapse navbar-collapse bx_navbar2" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto links" >

            </ul>
        </div>
        --}}
        <div class="row @admin('active') d-lg-none @else d-md-none @endadmin current_menu">
            <!--<div class="col justify-content-start float-left">-->
                <div class="col justify-content-start d-flex">
                <a href="#" class="btn  btn_menu d-xl-none ml-4 " id="botonmenu" style="">
                    <img src="{{asset('icon/menu_green.svg')}}" height="28" style="">
                    <!--<img src="{{ asset("ima/sesion2.png") }}" height="32">-->
                </a>
            </div>
        </div>
        {{--
        <div class="row d-lg-none admin_menu">
            <!--<div class="col justify-content-start float-left">-->
                <div class="col justify-content-start d-flex">
                <a href="#" class="btn  btn_menu d-xl-none ml-4 " id="botonmenu" style="">
                    <img src="{{asset('icon/menu_blue.svg')}}" height="28" style="">
                    <!--<img src="{{ asset("ima/sesion2.png") }}" height="32">-->
                </a>
            </div>
        </div>
        --}}
        <!-- enlaces RRSS -->
        <ul class="rrss">
            <div >
                    <a href="https://www.linkedin.com/in/bahiaxip/" target="_blank">
                        <div class="linkedin"></div>    
                    </a>
                    
                </div>
        </ul>
    </div>
    
</nav>