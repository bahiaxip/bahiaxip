const token = document.getElementsByName('csrf_token')[0].getAttribute('content');
const route = document.getElementsByName('route_name')[0].getAttribute('content');
//console.log(route)
function editor_init(field){
    //CKEDITOR.plugins.addExternal('codesnippet',base+'/static/libs/ckeditor/plugins/codesnippet/','plugins.js');
    CKEDITOR.replace(field,{
        height:['400px'],
        language: '{{app()->getLocale()}}',
        filebrowserUploadUrl:'/upload',
        fileTools_requestHeaders:{
            'X-Requested-With':'XMLHttpRequest',
            'X-CSRF-TOKEN':'{{csrf_token()}}'
        },
        //skin y extraPlugins no están instalados
        //skin:'mono',
        //extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,textwatcher,emoji,panelbutton,preview,wordcount',
        toolbar:[
        { name:'clipboard', items:['Cut','Copy','Paste','PasteText','-','Undo','Redo']},
        //{ name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Image','Link','Unlink','Blockquote']},
        //eliminamos 'Image','Link' y 'Unlink' temporalmente
        { name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Blockquote']},
        { name: 'document', items:['CodeSnippet','EmojiPanel','Preview','Source']}
        ]
    })
    CKEDITOR.instances.body_plus.resize('100%','600px');

}

//botón nav activo
function set_active(){


}
//solucionado el error de doble llave {{}} con Vue al cargar el texto del textarea con Ckeditor
//mediante la etiqueta en el textarea "v-pre", esto permite a Vue ignorar el elemento.
function testBodyPlus(e){
}


//necesario almacenarlo en localstorage
//reanudar/detener animación cubo 

function pausar(){
    let cubo3d = document.querySelector('.cubo2');
    let div_pause = document.querySelector('.cubo_pause');
    if(cubo3d.style.animationPlayState == 'paused'){
        let cubo2 = document.querySelector('.cubo2');
        //necesario añadirle segundos desde los estilos, después establecer la animación desde aquí en 0,
        //si no al cargar la página en pausadoinicia la animación hasta que carga JavaScript
        cubo2.style.animationDelay = '0s';
        //reanudamos la animación
        cubo3d.style.animationPlayState='running';
        //sustituimos el icono de play por el de pause
        div_pause.style.backgroundImage= "url('../icon/icon_pause.svg')";
        //establecemos en LocalStorage()
        setStorage(1);        
    }
    else{
        //pausamos la animación
        cubo3d.style.animationPlayState='paused';
        //sustituimos el icono de pause por el de play
        div_pause.style.backgroundImage= "url('../icon/icon_play.svg')";
        //establecemos en LocalStorage()
        setStorage(0);
    }
}

function setStorage(num){
    localStorage.setItem('bxcube_animate',num);
}
function getStorage(){

}
function showPlay(){
    let div_pause = document.querySelector('.cubo_pause');
    
    div_pause.style.display = 'block';

}

function hidePlay(){
    let div_pause = document.querySelector('.cubo_pause');
    
    div_pause.style.display = 'none';
}
window.addEventListener('load',()=>{
    
    if(localStorage.getItem('bxcube_animate') == 0){
        let div_pause = document.querySelector('.cubo_pause');        
        pausar();
    }else{
        let cubo2 = document.querySelector('.cubo2');
        //necesario añadirle segundos desde los estilos, y después establecer la animación desde aquí en 0,
        //si no al cargar la página en pausado inicia la animación hasta que carga JavaScript
        cubo2.style.animationDelay = '0s';
    }

    //botón flotante 
    let btn_floatup = document.querySelector('.btn_floatup');
    console.log(btn_floatup)
    let toggle_floatup;
    window.addEventListener('scroll',function(e){
        //console.log("scrolling...",window.scrollY)
        if(btn_floatup){
            console.log(window.scrollY)
            if(window.scrollY > 200){
                if(!toggle_floatup){
                    btn_floatup.style.opacity = '1';
                    //AOS.refresh();
                    toggle_floatup = true;
                }
                //console.log("mostrar botón")
            }else{
                btn_floatup.style.opacity = '0';
                toggle_floatup = false;
                //console.log("ocultar botón")
            }
        }
        
    })

    showMenu();
})
// función subir de botón flotante 
function up(){
    window.scrollTo({
        top:0,
        behavior:'smooth',
    });
}
//función menú oculto
function showMenu(){
    let btn = document.querySelector('.current_menu .btn_menu');
    let back = document.querySelector('#back_menu');
    console.log("btn: ",btn)
    btn.addEventListener('click',(e)=>{
        back.classList.toggle('active');
        document.querySelector('#latleft_oculto').classList.toggle("active");
        e.preventDefault();
    })
    back.addEventListener('click',(e)=>{
        back.classList.toggle('active');
        document.querySelector('#latleft_oculto').classList.toggle("active");
        e.preventDefault();
    })
    console.log("actives")
}
