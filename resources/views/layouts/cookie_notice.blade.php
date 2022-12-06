<div class="banner_cookies @if(get_cookies() != 'true') {{'active'}}@endif" >
    Establecer permisos a cookies
    <button class="btn btn-sm" onclick="toggleModalCookies('show')">Configurar</button>
    <button class="btb btn-sm btn_banner" onclick="activeAllCookies({{get_cookie_analytics()}},'banner')">Activar todas</button>
</div>
<div class="div_cookies">
        <div class="cookies">
            <div class="logus">
                <img src="{{asset('ima/logo_BX_verdex200.png')}}" alt="" />
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
                    <h5>Cookies estrictamente necesarias</h5>
                    La cookies estrictamente necesarias:
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
                        Esta web utiliza Google Analytics para recopilar información anónima destinada a estadísticas.
                    
                </div>
            </div>
            <div class="footer_cookies">
                <button class="btn btn-sm" onclick="saveCookies()"> Guardar cambios</button>
                <button class="btn btn-sm btn_modal" onclick="activeAllCookies({{get_cookies(),'modal'}})"> Activar todas</button>
            </div>
        </div>
    </div>