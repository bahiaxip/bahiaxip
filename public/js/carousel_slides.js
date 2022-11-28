window.addEventListener('load',()=>{

    if(route == 'home'){
        (async ()=>   // async IIFE code for slider.
          {

          const
            interval       = 1500  // ms
          , paddingRight   = 50
          , slideContainer = document.querySelector('.all_skills') 
          , slidesWrapper  = document.querySelector('.carousel_skills')
          , slides         = document.querySelectorAll('.carousel_skills > li')
          , delay          = ms => new Promise(r => setTimeout(r, ms))
          , movLeft = (el, mov) => new Promise(r =>
            {
            el.ontransitionend =_=>
              {
              el.ontransitionend = null
              el.style.transition = 'none';
              r()
              }
            el.style.transition = '1s';
            el.style.transform  = `translateX(${-mov}px)`;

            });
        //console.log(slidesWrapper)
          let index = 0;

          while (true) // infinite carrousel loop
            {

            await delay( interval )

            await movLeft( slidesWrapper, slides[index].clientWidth + paddingRight  )

            slidesWrapper.appendChild( slides[index] )  // mov first slide to the end
            slidesWrapper.style.transform    = `translateX(0)` // rest translateX
            index = ++index % slides.length

            }
        })()
    }
})