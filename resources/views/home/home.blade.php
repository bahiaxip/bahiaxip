@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row mt-3 mb-3">
        <div class="col-md-12 col-xl-9 pl-xl-0">
            <div class="carousel slide" id="principal-carousel"  data-bs-ride="true" >
                <div class="carousel-indicators">
				    <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				    <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
				    <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
				    <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
				    <button type="button" data-bs-target="#principal-carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
			  </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">                        
                        <img class="d-block w-100 imagen-car" src="ima/fondo_expressjs.png">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 imagen-car" src="ima/linux.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 imagen-car" src="ima/mysql.jpg" >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 imagen-car" src="ima/github.jpg" >
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
        </div>
        
        <div id="latcol" class="col-8 mx-auto col-xl-3 bg-dark text-center rounded mt-3 mt-xl-0 p-0 ">
            <!--<h5 class="text-white pt-2 font-weight-bold">Entradas Recientes</h5>-->
            @foreach($posts as $post)
                <div class="div_lat pb-3 pt-2">
                    <h4  class="" >
                        <a class="columna_index" href="#" >
                            {{$post->title}}
                        </a>
                    </h4>
                    <p class="text-white columna_index2">{{$post->body_main}}</p>
                    
                </div>
                <div class="w-100 d-xl-none" style="height:10px;background-color:white"></div>
            
            @endforeach
        </div>
        
    </div>
</div>
@endsection