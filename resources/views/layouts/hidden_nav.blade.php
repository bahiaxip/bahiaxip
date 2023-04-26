<ul id="hidden_list" class="hidden_list">  
    {{--
    @section("sidebar-bar")                
    @show

    @guest
        <li class="nav-link  d-xl-none "><a href="{{ route('login') }}">Login</a></li>
        <li class="nav-link d-xl-none "><a href="{{ route('register') }}">Registro</a></li>
    @endguest
    
    --}}
    <div class="">
        <li class="hidden_link d-md-none">
            <a class="" href="{{asset("/")}}" class="nav-link ">Inicio</a>
        </li>
        <li class="hidden_link d-md-none">
            <a class="" href="{{ route("blog") }}" class="nav-link">Blog</a>
        </li>
        <li class="hidden_link d-md-none">
            <a class="" href="{{route("contact")}}" class="nav-link">Contacto</a>
        </li>
        <li class="hidden_link d-md-none">
            <a class="" href="{{route("projects")}}" class="nav-link">Proyectos</a>
        </li>
        <!--
        <li class="nav-link  d-md-none">
            <a href="#">Proyectos</a>
        </li>
        -->
        @admin('active')
        <li class="hidden_link">
            <a class="" href="{{ asset("posts") }}" >Entradas</a>
        </li>
        @endadmin
        @admin('active')
        <li class="hidden_link">
            <a class="" href="{{asset("categories")}}" class="nav-link">Categorías</a>
        </li>
        @endadmin
        @admin('active')
        <li  class="hidden_link">
            <a class="" href="{{asset("tags")}}" class="nav-link ">Etiquetas</a>
        </li>
        @endadmin
    </div>
</ul>