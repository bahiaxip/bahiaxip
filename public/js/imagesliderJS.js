 /* JAVASCRIPT */

        
 /* const btn1 = document.querySelector('.btn1');
 const btn2 = document.querySelector('.btn2');
 const btn3 = document.querySelector('.btn3');
 const btn4 = document.querySelector('.btn4');
 const btn5 = document.querySelector('.btn5');
 
 const list = [btn1, btn2, btn3, btn4, btn5];
 const img1 = document.querySelector('.img1');
 
 const nodeA = document.querySelectorAll('.center .buttons a');
 const listA = [].slice.call(nodeA); */

 function slider(element){    
    //cerramos el interval si existe
    clear();
    //pasamos imágen y fondo del botón
    slide(element);

 }
 /* btn1.addEventListener('click',(e)=>{
    
    e.preventDefault();
     clear();
     slide(btn1);
 })
 btn2.addEventListener('click',(e)=>{
    console.log("llega")
    e.preventDefault();
     clear();
     slide(btn2);
 })
 btn3.addEventListener('click',()=>{
     clear();
     slide(btn3);
 })
 btn4.addEventListener('click',()=>{
     clear();
     slide(btn4);
 })
 btn5.addEventListener('click',()=>{
     clear()
     slide(btn5);
 }) */
 /* listA.forEach((datus)=>{
     datus.addEventListener('click',function(){ 
        console.log("mis datus")                   
         removeClassButton(listA);
         //quizás sería necesario hacer promesa o envolver en un settimeout para que no se añada la clase antes de acabar el foreach del método removeClassButton
         this.classList.add('active')
     })
 }) */

//comprobar y eliminar intervalo automático (se comprueba en todos los botones si se ha pulsado el botón y se elimina el interval)
function clear(){
    if(interval){
        clearInterval(interval)                
    }
}

//deslizar imágenes
function slide(slide){
    const img1 = document.querySelector('.img1');
    
    //eliminamos la clase active de todos los elementos de enlace (<a>), //el removeClassButton no funciona sin el window.addeventlistener('load'....)
    let nodeB = document.querySelectorAll('.home .buttons a');    
    nodeB.forEach((el)=>{    
        el.classList.remove('active');
    })
    //establecemos la clase active al elemento seleccionado
    slide.classList.add('active')
    //deslizamos la imagen según el botón seleccionado
    if(slide.classList.contains('btn1') ){
        img1.style.marginLeft = '0';
    }else if(slide.classList.contains('btn2')){        
        img1.style.marginLeft = '-20%';
    }else if(slide.classList.contains('btn3')){
        img1.style.marginLeft = '-40%';
    }else if(slide.classList.contains('btn4')){
        img1.style.marginLeft = '-60%';
    }else if(slide.classList.contains('btn5')){
        img1.style.marginLeft = '-80%';
    }
}

//encontrar botón con clase active y eliminar clase active
/* function removeClassButton(){
    console.log("en removeclassbutton")
    listA.forEach((element)=>{
        console.log("element: ",element)
        element.classList.remove('active');
    })
} */

//intervalo automático
var interval = setInterval(()=>{
    const nodeA = document.querySelectorAll('.home .buttons a');
    const list = [].slice.call(nodeA);
    //filtro de botón con clase active
    let filter = list.filter((element) => element.classList.contains('active'));
    let index = list.indexOf(filter[0]);
    
    list[index].classList.remove('active');
    if(index>3){
        list[0].classList.add('active');
        slide(list[0])
    }else{
        list[index+1].classList.add('active');
        slide(list[index+1])
    }
},7000);