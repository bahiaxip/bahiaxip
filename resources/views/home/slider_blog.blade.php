<div class="carousel slide" id="principal-carousel"  data-bs-ride="carousel" >
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{url('/post/instalar-youtube-dl')}}">
                <img  class="d-block w-100 imagen-car" src="ima/youtubedl.jpg">
            </a>
            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0,0,0,.8);border-radius:6px">
                <h5>Descarga tus vídeos favoritos de Youtube</h5>                            
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 imagen-car" src="ima/linux.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5>Descarga todos tus vídeos de Youtube</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 imagen-car" src="ima/mongodb.jpg" >
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 imagen-car" src="ima/fondo_expressjs.png" >
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 imagen-car" src="ima/angular.jpg" >
        </div>
    </div>
    {{--
    <a href="#principal-carousel" class="carousel-control-prev" data-slide="prev" role="button">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a href="#principal-carousel" class="carousel-control-next" data-slide="next" role="button">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
    --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#principal-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#principal-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>