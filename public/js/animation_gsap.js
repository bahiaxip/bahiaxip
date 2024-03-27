//efecto dibujar iconos SVG
function setIcons(div_parent){
    //sustituido por clases CSS para cada stroke-dashoffset
    //Debido a que hemos establecido a -220px la propiedad 
    //stroke-dashoffset de forma genérica para todos los iconos, es necesario
    //retardar algunos con setTimeout o personalizar una (clase offset1,offset2,...) con 
    //un número de píxeles personalizado para cada uno de los iconos 
        
    //retardamos 0.8 segundos
    /* anulado por eliminación de iconos interactivos */
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
    },100)
}

window.addEventListener('load',()=>{
    
    if(route == 'home'){
        console.log("entramos a load")

        gsap.to('.profile',{y:0,opacity:1,duration:1,delay:0,ease:'power4.out'})
        gsap.delayedCall(.1,setIcons,['.title']);
        gsap.to('.center',{scale:1,duration:2,delay:.5,ease:'power4.out'})
        
        // gsap.to('.back_skill1',{
        //     scale: 1,
        //     duration:.5,
        //     delay: 0.5
        // })
        // gsap.to('.back_skill2',{
        //     scale: 1,
        //     duration:.5,
        //     delay: 0.5
        // })
//skills
        var tl=gsap.timeline();
        //dibujamos el primer bloque de elementos
    //las 2 líneas siguientes dan warning (GSAP target undefined not found)
        // tl.to('.box_skills1',{}).call(setIcons('.box_skills1'));
        // //dibujamos el segundo bloque de elementos
        // tl.to('.box_skills2',{}).call(setIcons('.box_skills2'));
        //gsap.to('.back_skill1')

        
        
        gsap.registerPlugin(ScrollTrigger);


        /* animationFooter('home','.section_blog'); */
        animationFooter('home');
        
        
    }

    if(route == 'blog' || route == 'tag' || route == 'category'){
        tl_blog = gsap.timeline();
        tl_blog.to('.div_search',{
            y:0,
            scale:1,
            duration:1
        })
        tl_blog.to('.title_blog',{
            y:0,
            /*transform:'rotateX(0deg)',*/
            opacity:1,
            duration:.5,
            ease:"bounce.out",
        }).to('.title_blog',{transform:'rotateX(0deg)'})

        tl_blog.to('.border_card',{
            x:0,
            ease:'back.out',            
            opacity:1,
            duration:1,
            stagger:0.5,
        })
        tl_blog.to('.box_pagination',{
            y:0,
            opacity:1,
            duration: .5
        })
        tl_blog.to('.aside',{
            x:0,
            opacity:1
        })
        
        animationFooter('blog')
    }

    if(route=='post' ){
        gsap.to('.box_card',{
            opacity:1,
            scale:1,
            ease:'power4.out',
            duration:1.5
        })
        gsap.to('.post .div_buttons',{
            opacity:1,
            ease:'power2.in',
            delay:.5,
            duration:2
        })
        animationFooter('post')
    }

    if(route == 'contact'){
        
        gsap.to('.contact',{
            y:0,
            duration:1,
            opacity:1,
            ease: 'power2.out',            
        })
        /*
        gsap.to('.board2',{ 
            delay:.5,           
            duration: 2,
            y:0,
            opacity:1,
        })
        */
        gsap.to('.circle',{
            delay:.5,
            duration:2,
            x:0,
            rotate: 1080,
            opacity:1
        })
        gsap.to('.text_email p',{
            delay:2.5,
            duration:2,
            ease:'power4.out',
            y:0,
            opacity:1

        })
        gsap.to('.div_name .name',{
            delay:2,
            duration:2,
            ease:'power4.out',
            //x:0,
            opacity:1

        })
        gsap.to('.div_name .job_profile',{
            delay:2,
            duration:2,
            ease:'power4.out',
            //x:0,
            opacity:1

        })
        animationFooter('contact',null,3.5)
    }
    if(route == 'projects'){
        gsap.to('.projects',{
            opacity:1,
            duration:2,
            delay:2.5,
            stagger:0.5
            
        })
        animationFooter('contact',null,3.5)
    }
    



    
});
//animación footer
function animationFooter(path,selector=null,secondsDelay=null){
    let tlicon;
    let delay = 2;
    if(secondsDelay){
        delay = secondsDelay;
    }

    if(path == 'home'){
        gsap.to('.footer .div_animation',{
            scale:1,
            ease: 'power2.out',
            duration:2,
            delay: 2,
            /* scrollTrigger:{
                trigger: selector,
                start:'top top',
                end:'+=300 100%',
                scrub:1,
            } */
        })
        gsap.to('.textfooter',{
            x:0,
            opacity:1,
            duration:3,
            delay:delay,
            ease: 'power2.inOut',
            scrollTrigger:{
                trigger: selector,
                start:'top top',
                end:'+=300 100%',
                scrub:1,
            }
        })
        tlicon = gsap.timeline({
            scrollTrigger:{
                trigger:selector,
                start:'top top',
                end:'+=500 100%',
                //scrub:1,
                //markers:true,    
            }
        });
    }else if(path == 'blog' || path == 'contact' || path == 'post'){
        gsap.to('.footer .div_animation',{
            scale:1,
            ease: 'power2.out',
            duration:2,
            delay: delay,
        });
        gsap.to('.textfooter',{            
            opacity:1,
            duration:5,
            delay:delay+5,
            ease: 'power2.inOut',
        })
        tlicon=gsap.timeline({delay:delay});
    }
        
    tlicon.from('.icon',{
        y:-200,
        ease: 'bounce.inOut',            
        duration:3,
        delay:1
        
    })        
    .to('.icon',{            
        x:-20,
        duration:0.8,
    })
    .to('.icon',{            
        x:10,
        duration:0.8
    }).to('.icon',{
        x:0,
        duration: 0.5
    })
    .to('.icon',{
        scale:1.1,
        duration: 0.5
    })
    .to('.icon',{
        delay:2,
        scale:1,
        duration: 0.5
    })
}
function effectButton(){
    let btn = document.querySelector('.post .wrap_button');
    if(btn.style.width=='100%'){
        btn.style.width="0"
    }else{
        btn.style.width="100%"    
    }
    
}
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