const token = document.getElementsByName('csrf_token')[0].getAttribute('content');
const route = document.getElementsByName('route_name')[0].getAttribute('content');
console.log(route)
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
let cubo3d_active=1;
function pausar(){
    let cubo3d = document.querySelector('.cubo2');
    let div_pause = document.querySelector('.cubo_pause');
    if(cubo3d.style.animationPlayState == 'paused'){
        cubo3d.style.animationPlayState='running';
        div_pause.style.backgroundImage= "url('../icon/icon_pause.svg')";
        cubo3d_active = 1;
    }
    else{
        cubo3d.style.animationPlayState='paused';
        div_pause.style.backgroundImage= "url('../icon/icon_play.svg')";
        cubo3d_active = 0;
    }
}

function showPlay(){
    let div_pause = document.querySelector('.cubo_pause');
    div_pause.style.display = 'block';

}

function hidePlay(){
    let div_pause = document.querySelector('.cubo_pause');
    div_pause.style.display = 'none';
}

