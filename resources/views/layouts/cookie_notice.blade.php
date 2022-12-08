<div class="banner_cookies @if(get_cookies() != 'true') {{'active'}}@endif" >
    <div class="info_links">
        <p>
            Utilizamos cookies para ofrecer contenido personalizado y analizar el tráfico en esta web.     
        </p>
        
        <div>
            <span>
                <a class="link" data-hover="Más información" href="#"></a>
            </span>
            <span>
                <a class="link" href="#" onclick="toggleModalCookies('show',event)" data-hover="Configurar">
                </a>
            </span>
        </div>

    </div>
    <div class="div_buttonall">
        
        <button class="btn_cookies btn_banner" onclick="activeAllCookies({{get_cookie_analytics()}},'banner',event)">
            <span>Activar todas</span>
        </button>
    </div>
</div>
<div class="div_cookies">
        <div class="cookies">
            <div class="logus">
                <img src="{{asset('ima/logo_BX_verdex200.png')}}" alt="" />
                <a onclick="toggleModalCookies('hide',event)">
                    <span class="close"></span>
                </a>
            </div>
            <div class="nav nav-tabs cookies_links" id="nav-tab" role="tablist">
                <button class="nav-link active" id="needed_cookies_tab" type="button" data-bs-toggle="tab" data-bs-target="#needed_cookies" role="tab" aria-controls="collapseExample" aria-selected="true">
                    Cookies necesarias
                </button>
                <button class="nav-link" id="analytic_cookies_tab" type="button" data-bs-toggle="tab" data-bs-target="#analytic_cookies" role="tab" aria-controls="collapseExample" aria-selected="false">
                    Cookies de analítica
                </button>
            </div>
        
            <div class="tab-content cookies_body " id="nav-tabContent">
                <div class="tab-pane fade show active" role="tabpanel" id="needed_cookies" aria-labelledby="needed_cookies_tab">
                    <div class="form-check form-switch switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked onclick="return false">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Activadas</label>
                </div>
                    <h5>Cookies necesarias</h5>                    
                    <ul>
                        <li>Sesión</li>
                        <li>Seguridad</li>
                        <li>Aceptar cookies</li>
                    </ul>
                    
                </div>
                <div class="tab-pane fade" id="analytic_cookies" role="tabpanel" aria-labelledby="analytic_cookies_tab">
                    <div class="form-check form-switch switch analytics">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" @if(get_cookie_analytics() == 'true'){{'checked'}} @endif onclick="setSwitch(this)" >
                        <label class="form-check-label" for="flexSwitchCheckDefault">
                            @if(get_cookie_analytics() == 'true')
                            {{'Activadas'}}
                            @else
                            {{'Desactivadas'}}
                            @endif
                        </label>
                    </div>
                        <h5>Cookies de analítica</h5>
                        <ul>
                            <li>Número de visitantes</li>
                            <li>Páginas más vistas</li>
                            <li>Personalización de contenido</li>
                        </ul>
                        {{--
                        Esta web utiliza Google Analytics para recopilar información anónima destinada a estadísticas.
                        --}}
                    
                </div>
            </div>
            <div class="footer_cookies">
                <button class="" onclick="saveCookies(event)"><span> Guardar cambios</span></button>
                <button class="btn_modal" onclick="activeAllCookies({{get_cookies()}},'modal',event)"><span>Activar todas</span></button>
            </div>
        </div>
    </div>