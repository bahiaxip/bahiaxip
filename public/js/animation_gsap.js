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
    console.log("ruta: ",route)
    if(route == 'home'){

        /* pruebas con bahiaxip en inicio 
        gsap.to('.box_profile .div_animation',{
            //scale:0,
            y:0,
            opacity: 1,
            ease: 'power2.out',
            duration:2,
            delay: 2,
        })
        tlicon = gsap.timeline();
        
        tlicon.from('.icon',{
            y:-200,
            ease: 'bounce.inOut',            
            duration:3,
            delay:2.5,
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
        */
        //gsap.from('.profile',{x:-200})        
        //gsap.to('.profile',{x:0,opacity:1,duration:1})
//profile - name and position
        gsap.to('.profile',{y:0,opacity:1,duration:1,delay:2,ease:'back.out'})
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
//skills
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
                markers:false,
                
                scrub:1,
                start: '80% top',
                end:'top bottom'
            },
        }).to('.section_skills h2',{        
            scale:1,
            duration:.5,
            //ease:'bounce',
            scrollTrigger:{
                trigger:'.profile',
                //toggleActions: "restart pause resume none",
                markers:false,
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
        /*
        gsap.defaults({
            //ease:'bounce',
            //duration:5
        })
        */
//progress bar
        var tl3 = gsap.timeline(),
        tl4 = gsap.timeline(),
        tl5 = gsap.timeline();
        tl3.from('.box_progress_skills .left',{
            x:-500,opacity:0,
            ease:'power2.out',
            duration:3,
            scrollTrigger:{
                trigger:'.box_skills1',
                markers:false,
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
                markers:false,
                //scrub:3,
                scrub:1,
                start: 'top top',
                end:()=>'+=800 100%'    
            }
        })
//carousel skills
        tl3.from('.all_skills',{
            scale:0,opacity:0,
            ease:'linear',
            delay:3,
            duration:2,
            scrollTrigger:{
                trigger:'.box_skills1',
                markers:false,
                //scrub:3,
                scrub:2,
                start: '50% top',
                end:'+=900 100%'    
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
            //console.log(index)
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
                    markers:false
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

//blog
        gsap.from('.section_blog h2',{
            scale:0,
            opacity:0,        
            ease:'power2.out',
            scrollTrigger:{
                trigger:'.box_skills2',
                //toggleActions: "restart pause resume none",
                //markers:true,            
                scrub:1,
                start: 'center top',
                end:'+=800 bottom'
            },
        })
        gsap.from('.row.blog',{
            
            duration:2,
            delay:2,
            
            opacity:0,
            x:'100%',
            ease:'power2.out',
            
            scrollTrigger:{
                trigger:'.box_skills2',
                start:'center top',
                end:'+=1200 100%',
                scrub:1,
                //markers:true,
            }
        })
        animationFooter('home','.section_blog');
        
        
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