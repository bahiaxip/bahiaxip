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
    //dibujamos el primer bloque de elementos
    tl.to('.box_skills1',{}).call(setIcons('.box_skills1'));
    //dibujamos el segundo bloque de elementos
    tl.to('.box_skills2',{}).call(setIcons('.box_skills2'));
    //gsap.to('.back_skill1')
    gsap.registerPlugin(ScrollTrigger);
    /*
    var tl2 = gsap.timeline({
        //defaults:{ease:'none'},
        scrollTrigger: {
            trigger:'.main',
            markers:true,
            start: 'top top',

            //end:'100%',
            end: '+=500 100%',
            //end: '100% 100%',
            //end:'+=800 100%',

            //scrub:true,
            scrub:1,
            //pin:true,
            //delay:2
        }        
    })//.from('#back_skill1',{scale:0})    
    */
    /*
    .to('.back_skill2',{
        scale: 1,
        duration:.8
    })
    */
    
    /*
    tl.from('.section_blog',{opacity:0,duration:2})
    tl.to('.section_blog',{opacity:1,duration:2})
    */
//h2 SKILLS
    var tl2 = gsap.timeline();
    tl2.from('.section_skills h2',{
        scale:0,
        opacity:0,        
        ease:'power2.out',
        scrollTrigger:{
            trigger:'.profile',
            //toggleActions: "restart pause resume none",
            markers:true,
            
            scrub:1,
            start: '80% top',
            end:'+=800 bottom'
        },
    }).to('.section_skills h2',{        
        scale:1.5,
        duration:.5,
        //ease:'bounce',
        scrollTrigger:{
            trigger:'.profile',
            //toggleActions: "restart pause resume none",
            markers:true,
            scrub:1,
            start: '80% top',
            end:'+=1200 bottom'
        },
    })
    //tl2.from('.box_progress_skills ',{x:-500,opacity:0})
    /*
    tl2.to('h2',{
        x:0,
        opacity:1,
        duration:1,
        
    })
    */
//progress y carousel
    //tl.('.box_progress_skills .left',{x:-500,opacity:0})
    gsap.defaults({
        //ease:'bounce',
        //duration:5
    })
    var tl3 = gsap.timeline(),
    tl4 = gsap.timeline(),
    tl5 = gsap.timeline();
    gsap.from('.box_progress_skills .left',{
        x:-500,opacity:0,
        ease:'power2.out',
        duration:3,
        scrollTrigger:{
            trigger:'.box_skills1',
            markers:true,
            //scrub:3,
            scrub:1,
            start: 'top top',
            end:'+=800 100%'    
        }
    })
    gsap.from('.box_progress_skills .right',{
        x:500,opacity:0,
        ease:'power2.out',
        duration:3,
        scrollTrigger:{
            trigger:'.box_skills1',
            markers:true,
            //scrub:3,
            scrub:1,
            start: 'top top',
            end:()=>'+=800 100%'    
        }
    })
    gsap.from('.all_skills',{
        scale:0,opacity:0,
        ease:'linear',
        delay:3,
        duration:2,
        scrollTrigger:{
            trigger:'.box_skills1',
            markers:true,
            //scrub:3,
            scrub:2,
            start: '30% top',
            end:'+=800 100%'    
        }
    })
        
    
    /*
    ScrollTrigger.create({
        animation: tl4,
        trigger:'.box_skills1',
        markers:true,
        //scrub:3,
        scrub:1,
        start: 'top top',
        end:'+=400 100%'
    })
    */
    //tl3.to('.all_skills',{scale:1,opacity:1,duration:2.5})
    //.to('box_progress_skills .left',{opacity:1,x:0});
    


});

//tl.to('.box_skills',{x:'1000',duration:1}).call(setIcons);