@extends("layouts.app")

@section("content")

<div class="container mt-4">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Etiqueta                    
                </div>
            </div>
            
            <div class="panel-body">
                
                {{ Form::model($tag, ["route" => ["tags.update", $tag->id],
                            "method" => "PUT"]) }}
                
                @include("admin.tags.partials.form")
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

