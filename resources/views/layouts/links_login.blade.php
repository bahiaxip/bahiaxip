@guest
    {{--
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
    --}}
@else
    <li class="nav-item dropdown" >
        <a id="navbarDropdown" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative" >
            {{ Auth::user()->name }}
        </a>
        <div id="menu_logout" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" >
            
            <a  class="dropdown-item" style="color:#353535" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            
            
            
        </div>
        {{--
        <div class="" aria-labelledby="navbarDropdown" >
            <a class="dropdown-item" href="{{ route('logout') }}"
               >
                {{ __('Cerrar session') }}
            </a>

            
        </div>
        --}}
    </li>
@endguest
@section('scripts')
<script>
    
    function showMenuLogout(){
        let menu = document.querySelector('#menu_logout');
        menu.style.display="flex";

    }

    let app = document.querySelector('#app');
    app.addEventListener('click',(e)=>{
        e.preventDefault();
        let menu = document.querySelector('#menu_logout');
        if(menu.style.display == "flex"){
            menu.style.display = 'none';
        }
    })
</script>
@endsection