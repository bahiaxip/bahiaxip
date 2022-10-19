@extends("layouts.app")

@section("content")

<div class="container mt-4">
    <div class="row admin_posts">
        <div class="col-10 offset-1">
            <div class="panel panel-default">
                <div class="header">
                    <h5>Lista de Categorías</h5>
                    <a href="{{ route("categories.create") }}" class="btn btn-sm btn_pry float-right">
                        Crear
                    </a>
                </div>
            </div>
            
            <div class="panel-body">
                <div id="alert" class="alert alert-info d-none"></div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th with="10px">ID</th>
                            <th>Nombre</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td with="10px">
                                <a href="{{ route("categories.show",$cat->id) }}" class="btn btn-sm btn_pry">
                                    Ver
                                </a>
                            </td>                            
                            <td with="10px">
                                <a href="{{ route("categories.edit",$cat->id) }}" class="btn btn-sm btn_sry">
                                    Editar
                                </a>
                            </td>
                            <td with="10px">
                                {!! Form::open(["route" => ["categories.destroy", $cat->id], 
                                "method" => "DELETE"]) !!}
                                <button class="btn btn-sm btn_red" onclick="confirm(event,this)">
                                    Eliminar                                    
                                </button>
                                {{ Form::close() }}
                            </td>
                            {{--
                            @role("admin")
                            @if($post->status=="DRAFT")
                            <td with="10px">
                                {!! Form::open(["route" => ["posts.approve", $post->id], 
                                "method" => "PUT"]) !!}
                                <button class="btn btn-warning btn-sm" >
                                    Aprobar                                    
                                </button>
                                {{ Form::close() }}
                            </td>
                            @endif
                            @endrole
                            --}}
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
