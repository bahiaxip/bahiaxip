@extends("layouts.app")

@section("content")

<div class="container mt-4">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Categoría                    
                </div>
            </div>
            
            <div class="panel-body">
                
                {{ Form::model($cat, ["route" => ["categories.update", $cat->id],
                            "method" => "PUT"]) }}
                
                @include("admin.categories.partials.form")
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

