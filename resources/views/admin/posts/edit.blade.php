@extends("layouts.app")

@section("content")

<div class="container mt-4">
    <button style="float:left" class="btn btn-primary " onclick="window.location='{{ route("posts.index") }}'">Volver</button>
    <div class="row">
        <div class="col-10 offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Entrada                    
                </div>
            </div>
            
            <div class="panel-body">
                <!-- este submit primeramente se hace con un onclick desde la vista partials.form llamando al método guardar(), desde este método se realiza el submit mediante el name formu-->
                {{ Form::model($post, ["route" => ["posts.update", $post->id],"name"=>"formu",
                            "method" => "PUT", "files"=> true]) }}
                
                @include("admin.posts.partials.form")
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>


@endsection


