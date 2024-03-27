
//mostrar/ocultar modals a través de parámetro de selector
function toogleModal(type,ev,selector, el=null){
    ev.preventDefault();
    let modal = document.querySelector(selector);
    if(el != null){
        modal = document.querySelector(el);
    }    
    if(type == 'hide'){
        modal.style.visibility = 'hidden';
        modal.style.opacity = '0';
        modal.style.transform = 'scale(0)';

    }else{
        //checkInitAnalytics();
        modal.style.visibility = 'visible';
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
    }
}

/* optimizado con la función de arriba */
/* function toogleModalAdvice(type, ev, el=null){
    ev.preventDefault();    
    let modal = document.querySelector('.advice');
    
    if(el != null){
        modal = document.querySelector(el);
    }    
    if(type == 'hide'){
        modal.style.visibility = 'hidden';
        modal.style.opacity = '0';
        modal.style.transform = 'scale(0)';

    }else{
        //checkInitAnalytics();
        modal.style.visibility = 'visible';
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
    }
}

function toogleModalPrivacity(type, ev, el=null){
    ev.preventDefault();    
    let modal = document.querySelector('.privacity');
    
    if(el != null){
        modal = document.querySelector(el);
    }    
    if(type == 'hide'){
        modal.style.visibility = 'hidden';
        modal.style.opacity = '0';
        modal.style.transform = 'scale(0)';

    }else{
        //checkInitAnalytics();
        modal.style.visibility = 'visible';
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
    }
} */