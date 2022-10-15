@extends("layouts.app")

@section("content")

<div class="container mt-4">    
    <div class="row ">
        <div class="col column mb-3"> 
            <button style="float:left" class="btn btn-primary " onclick="window.location='{{ route("posts.index") }}'">Volver</button>
            
            <h5>Ver Entrada</h5>
            <button style="float:right" onclick="botones()" class="btn btn-primary" data-toggle="modal" data-target="" >Boton</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 column ">
            Título
        </div>
        <div class="col-8 column">
            <p>{{ $post->title }}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 column">
            Slug
        </div>
        <div class="col-8 column">
            <p>{{ $post->slug }}</p>
        </div>
    </div>    
    @if($post->file)
    <div class="row">
        <div class="col column">
            <h5>Imagen Principal</h5>
            <img src="{{ $post->file}}" >
        </div>
    </div>
    
    @endif
    <div class="row">
        <div class="col column mt-3">
            <p><strong>Contenido Principal</strong></p>            
            <?php echo $post->body_main; ?>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <p><strong>Contenido Adicional</strong></p>
            <?php echo $post->body_plus; ?>
        </div>
    </div>
                
</div>
@endsection


