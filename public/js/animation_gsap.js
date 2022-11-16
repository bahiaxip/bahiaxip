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
            end:'top bottom'
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
            end:'+=900 bottom'
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
    tl3.from('.box_progress_skills .left',{
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
    tl3.from('.box_progress_skills .right',{
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
    tl3.from('.all_skills',{
        scale:0,opacity:0,
        ease:'linear',
        delay:3,
        duration:2,
        scrollTrigger:{
            trigger:'.box_skills1',
            markers:true,
            //scrub:3,
            scrub:2,
            start: '50% top',
            end:'+=1000 100%'    
        }
    })
    //tl3.to('.all_skills',{duration:1,delay:1}).call(dar);
        
    
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
    
//array de barras de progreso
let progressSkill = document.querySelectorAll('.progress_skill');
progressSkill.forEach((item,index)=>{
    console.log(index)
    const title = item.querySelector('.title .percent');
    const progress = item.querySelector('.div_progress');
    const progressbar = progress.querySelector('.progress0');
    //porcentaje establecido en el HTML de cada barra de progreso 
    const percent = title.textContent;
    //console.log(progress)
    let a = 'pbtl_'+index;
    a = gsap.timeline({
        defaults:{
            duration:3,
            ease:'bounce.out',
            
        },
        scrollTrigger:{
            trigger: '.box_skills1',
            scrub:2,
            delay:2,

            start: '30% top',
            end:'+=800 100%',
            markers:true
            //toogleActions: 'play pause resume reset'
        }
    })
    a.fromTo(progressbar,{width:0},{width:percent});
    
    a.from(title,{
        duration:3,
        
        ease:'bounce.out',
        textContent: 0 + '%',
        snap:{ textContent: 1},
    },'<');

})
});
//progressBar();
/*
function dar(){
tlm.invalidate().kill();
tlm.restart();
}
*/
/*var tlm;
function progressBar(){
    let progressbar = document.querySelector('.progress0.progress1');
    //console.log("progressbar: ", progressbar);
    tlm = new TimelineMax({
        paused:true
    })
    tlm.to({},3,{
        force3D:true,
        onUpdateParams:['{self}'],
        onUpdate:function(timeline){
            TweenMax.set(progressbar,{
                scaleX:timeline.progress(),
                transformOrigin:'0px 0px'
            })
        }
    })
    tlm.play();
}*/





/*function dar(){

    //let div =document.querySelector('.progress_skill.skill1 .percent');
    let percent = document.querySelector('.progress_skill.skill1 .percent').innerHTML;
    console.log(percent)
    //console.log(div.textContent);
    const target = '100%';
    gsap.fromTo('.div_progress.progress_back',{width:0},{
        width:percent,
        duration:2,
        ease:'bounce.out'
    })
    gsap.from('.progress_skill.skill1 .percent',{
        textContent:0+'%',
        duration:2,
        ease:'bounce.out',
        snap:{textContent:1}
    })
}*/



//tl.to('.box_skills',{x:'1000',duration:1}).call(setIcons);