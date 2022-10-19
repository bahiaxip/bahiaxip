@extends("layouts.app")

@section("content")

<div class="container mt-4">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="panel panel-default">
                <div class="panel-heading mb-4">
                    <h5>Ver Categoría</h5>                   
                </div>
            </div>
            
            <div class="panel-body">
                <p><strong>Nombre</strong> {{ $cat->name }}</p>
                <p><strong>Slug</strong> {{ $cat->slug }}</p>
                
            </div>
        </div>
    </div>
</div>
@endsection


