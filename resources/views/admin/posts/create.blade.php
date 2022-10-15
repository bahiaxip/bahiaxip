@extends("layouts.app")

@section("content")

<div class="container mt-4">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear Entrada                    
                </div>
            </div>
            
            <div class="panel-body">
                
                {{ Form::open(["route" => "posts.store", "files" => true, "name"=>"formu"]) }}
                
                @include("admin.posts.partials.form")
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
