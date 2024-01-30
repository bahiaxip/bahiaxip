

//Api Analytics
window.dataLayer = window.dataLayer || [];
//sacamos la función fuera del método setDefaultAnalytics() para
//que los métodos approveAnalytics() y denyAnalytics() dispongan de 
//alcance  a la función gtag(), cambiando la función de Google Analytics por defecto.
function gtag(){dataLayer.push(arguments);}
//consentimiento denegado por defecto
function setDefaultAnalytics(){
        gtag('consent','default',{
            'ad_storage':'denied',
            'analytics_storage':'denied'
        });
        gtag('js', new Date());
        gtag('config', 'G-NZ971N59M7');
}
//actualización de consentimiento permitido
function approveAnalytics(){
    gtag('consent', 'update', {
        'ad_storage': 'granted',
        'analytics_storage':'granted'
    });
}
//actualización de consentimiento denegado
function denyAnalytics(){
    gtag('consent', 'update', {
        'ad_storage': 'denied',
        'analytics_storage':'denied'
    });
}
/* fin API Analytics */


//cookie recordatoria de aceptar cookies (no sería necesaria es solo para no mostrar el banner siempre)
const cookieBx = document.getElementsByName('cookieBX')[0].getAttribute('content');
//cookieAnalaytics es el valor de la cookie "bahiaxip_analytics" al cargar la página
const cookieAnalytics = document.querySelector('.switch.analytics input').checked;
//console.log("cookieAnalytics: ",cookieAnalytics);
//booleano que indica si existe cookie recordatorio
let initBx;
//booleano que indica si se ha inicializado la api de Analytics
let initAnalytics;
//switchAnalytics es el valor del botón switch, por defecto asignamos
//el mismo valor de la cookie
let switchAnalytics = cookieAnalytics;
//comprueba si la API de Analytics se ha inicializado
checkInitAnalytics();
        
//función que establece el valor de botón switch de Google Analytics
//si lo pulsamos
function setSwitch(el){
    switchAnalytics = el.checked;
    setTextAnalytics();
    console.log(switchAnalytics)
    console.log(cookieAnalytics)
}
//crear cookie propia, definiendo si se actualizó a granted el 
//analytics_storage y mostrar el switch activo o desactivado
function updateAnalyticsApi(){
    //obtenemos el objeto dataLayer
    let dLayer = window.dataLayer;
    //comprobamos la última actualización (si existe) 
    let found = dLayer.findLast((el) => {
        if(el[0] && el[0] == 'consent' && el[1] == 'update'){ return el }
    })            
    console.log("encontrado: ",found);
    console.log("objeto dLayer: ",dLayer);

    if(switchAnalytics){
        /*if(found && found[2]){
            console.log(found[2]['ad_storage']);
        }*/
        approveAnalytics();
    }else{
    //Para ahorrar recursos comprobamos si existe una actualización 
    //anterior y si esa actualización tiene las 2 propiedades 
    //distintas a 'denied', si son distintas hacemos llamada al 
    //método denyAnalytics()
        //console.log("pasa por aquí");
        if(found && found[2]){
            if(found[2]['ad_storage'] && found[2]['analytics_storage']){
                if(found[2]['ad_storage'] != 'denied' || found[2]['analytics_storage'] != 'denied'){
                    //console.log("pasa por aquí tbn");
                    denyAnalytics();
                }
            }                    
        }else{
        //si no existe actualización anterior y las propiedades 
        //por defecto(objeto dLayer[0] con las propiedades consent y 
        //default) son distintas a 'denied' denegamos el consentimiento
            if(dLayer[0][2]['ad_storage'] != 'denied' || dLayer[0][2]['analytics_storage'] != 'denied'){
                //console.log("pasa por aquí tbn2");
                denyAnalytics();
            }
        }
    }
}
//función que actualiza la api de Analytics y guarda los cambios en la cookie de Analytics
function saveCookies(ev){
    checkInitBx();
    //actualizamos el consentimiento de Google Analytics
    updateAnalyticsApi();
    saveCookies2(null,'modal');
    //ocultamos el modal de configuración de cookies
    toggleModalCookies('hide',ev);
}

function checkInitAnalytics(){
    if(!initAnalytics){
        initAnalytics = true;
        setDefaultAnalytics();
    }       
}
function checkInitBx(){    
    if(!initBx){        
        initBx = true;
        saveCookies2('bx','bahiaxip');
    }
}
//parámetro anlayticsCookie es el valor de la cookie analytics 'bahiaxip_analytics'
//parámetro selector es si se llama desde el modal o el banner flotante
//estos parámetros se irán modificando mediante JavaScript mientras no se recargue la página
//y se cambie mediante el interruptor de activar/desactivar
function activeAllCookies(analyticsCookie,selector,ev){

    checkInitBx();
    checkInitAnalytics();
    toggleBannerCookies('hide');
    toggleModalCookies('hide',ev);
    if(analyticsCookie != true){

        switchAnalytics = "true";
        //Establecemos el input switch a true
        document.querySelector('.switch.analytics input').checked=true;
        updateAnalyticsApi();
        //establecemos la cookie mediante ajax

        saveCookies2('all',selector,ev);

    }
}

//función para establecer o eliminar cookies mediante Ajax
function saveCookies2(param = null,selector,ev){
    
    //let analytics = el.checked;
    //enviamos petición
    let xhtp = new XMLHttpRequest();
    let token = document.getElementsByTagName('meta')[2].getAttribute('content');
    var aleatorio=parseInt(Math.random()*99999999);
    let vinculo;
    if(param == 'bx' && selector == 'bahiaxip')
        vinculo = '/cookies?rand='+aleatorio+'&bahiaxip=true&_token='+token;
    else
        vinculo = '/cookies?rand='+aleatorio+'&analytics='+switchAnalytics+'&_token='+token+'&type='+param;
    let method = "POST";
    xhtp.open('POST',vinculo);
    xhtp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    console.log("entra: ",vinculo)
    xhtp.onreadystatechange = function(ev){
        if(xhtp.readyState == 4){
            //console.log(vinculo);return;    
            if(xhtp.status == 200){

                console.log("response: ",xhtp.response);
                if(param == 'bx' && selector == 'bahiaxip'){
                    //return response
                }else{
                    let resp = JSON.parse(xhtp.response);
                    //modificamos la función activeAllCookies con los 
                    //parámetro correspondientes y en el modal además 
                    //el texto de activadas o desactivadas
                    let banner = document.querySelector('.banner_cookies');
                    let modal = document.querySelector('.div_cookies');
                    modal.querySelector('.footer_cookies .btn_modal').setAttribute('onclick','activeAllCookies('+resp.value+',"modal")');
                    //establecemos el texto del input
                    setTextAnalytics(); 
                    
                    banner.querySelector('.btn_banner').setAttribute('onclick','activeAllCookies('+resp.value+',"banner")');
                //ocultamos el banner o el modal independientemente
                //de si es false o true, ya que informando de las
                //cookies es suficiente para no mantener el banner, 
                //ya que las de analytics son opcionales y las 
                //necesarias, al ser cookies de sesión ni siquiera 
                //es necesario el banner informativo
                     
                    toggleBannerCookies('hide');
                    
                    toggleModalCookies('hide',ev);
                }
                
            }else{
                console.log("Error: ",xhtp.statusText);
            }
        }
    }
    xhtp.send(vinculo);
}

function setTextAnalytics(){
    let modal = document.querySelector('.div_cookies');
    let text = 'Activadas';
    if(!switchAnalytics)
        text='Desactivadas';            
    modal.querySelector('.switch.analytics label').innerHTML = text;
}
function toggleModalCookies(type,ev,el=null){
    ev.preventDefault();    
    let modal = document.querySelector('.div_cookies');
    if(el != null){
        modal = document.querySelector(el);
    }    
    if(type == 'hide'){
        modal.style.visibility = 'hidden';
        modal.style.opacity = '0';
        modal.style.transform = 'translate(-50%,-50%) scale(0)';

    }else{
        checkInitAnalytics();
        modal.style.visibility = 'visible';
        modal.style.opacity = '1';
        modal.style.transform = 'translate(-50%,-50%) scale(1)';
    }
}
function toggleModalCookies2(type,ev){
    ev.preventDefault();
    let modal = document.querySelector('.div_cookies_info');
    if(type == 'hide'){
        modal.style.visibility = 'hidden';
        modal.style.opacity = '0';
        modal.style.transform = 'translate(-50%,-50%) scale(0)';

    }else{
        checkInitAnalytics();
        modal.style.visibility = 'visible';
        modal.style.opacity = '1';
        modal.style.transform = 'translate(-50%,-50%) scale(1)';
    }
}

function toggleBannerCookies(type){
    let banner = document.querySelector('.banner_cookies');
    if(type == 'hide'){
        banner.style.visibility = 'hidden';
        banner.style.opacity = '0';
    }else{
        banner.style.visibility = 'visible';
        banner.style.opacity = '1';
    }
}