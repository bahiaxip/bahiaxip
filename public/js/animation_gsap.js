//efecto dibujar iconos SVG
function setIcons(div_parent){
    //sustituido por clases CSS para cada stroke-dashoffset
    //Debido a que hemos establecido a -220px la propiedad 
    //stroke-dashoffset de forma genérica para todos los iconos, es necesario
    //retardar algunos con setTimeout o personalizar una (clase offset1,offset2,...) con 
    //un número de píxeles personalizado para cada uno de los iconos 
        
    //retardamos 0.8 segundos
    setTimeout(()=>{
            document.querySelectorAll(div_parent+' .offset1 .path').forEach((item) => {
                //console.log(item)
                item.classList.add('svg_active')
            });
            document.querySelectorAll(div_parent+' .offset2 .path').forEach((item) => {
                //console.log(item)
                item.classList.add('svg_active')
            });
            document.querySelectorAll(div_parent+' .offset3 .path').forEach((item) => {
                //console.log(item)
                item.classList.add('svg_active')
            });
        /*
        else
            setTimeout(()=>{
               back_skill.querySelectorAll('.path').forEach((item) => {
                    item.classList.add('svg_active')
                });
           },300)
       */
    //})
    },800)
}

window.addEventListener('load',()=>{

    //gsap.from('.profile',{x:-200})
    
    //gsap.to('.profile',{x:0,opacity:1,duration:1})
    gsap.to('.profile',{x:0,opacity:1})
    gsap.to('.back_skill1',{
        scale: 1,
        duration:.5,
        delay: 0.5
    })
    gsap.to('.back_skill2',{
        scale: 1,
        duration:.5,
        delay: 0.5
    })
    var tl=gsap.timeline();
    
    //gsap.to('.back_skill1')
    gsap.registerPlugin(ScrollTrigger);
    var tl2 = gsap.timeline({
        //defaults:{ease:'none'},
        scrollTrigger: {
            trigger:'.main',
            //markers:true,
            start: 'top top',

            //end:'100%',
            end: '+=10 100%',
            //end: '100% 100%',
            //end:'+=800 100%',

            //scrub:true,
            scrub:1,
            //pin:true,
            //delay:2
        }
    })//.from('#back_skill1',{scale:0})    
    /*
    .to('.back_skill2',{
        scale: 1,
        duration:.8
    })
    */
    //dibujamos el primer bloque de elementos
    tl.to('.box_skills1',{}).call(setIcons('.box_skills1'));
    //dibujamos el segundo bloque de elementos
    tl.to('.box_skills2',{}).call(setIcons('.box_skills2'));
})



//tl.to('.box_skills',{x:'1000',duration:1}).call(setIcons);