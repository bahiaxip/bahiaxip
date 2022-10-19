<div class="form-group">
    {{ Form::label("name", "Nombre de la etiqueta") }}
    {{ Form::text("name",null, ["class" => "form-control","id"=> "name"]) }}
</div>
<div class="form-group">
    {{ Form::label("slug", "Slug") }}
    {{ Form::text("slug",null, ["class" => "form-control","id"=> "slug"]) }}
</div>
<div class="form-group">
    {{ Form::label("status", "Estado") }}
    {{ Form::select("status",['DRAFT'=>'Borrador','PUBLISHED'=>'Público'],null,["class" => "form-select","id"=> "status"]) }}
    {{ Form::hidden('user_id',auth()->id())}}
</div>

<div class="form-group mtop16">
    {{ Form::submit("Guardar", ["class" => "btn btn-sm btn-primary"]) }}
</div>

@section("scripts")
<script src="{{ asset("js/stringToSlug/jquery.stringToSlug.min.js") }}"></script>
<script>
    $(document).ready(function()
    {
        $("#name, #slug").stringToSlug({//#name y #slug (campos donde recoger)
            callback: function(text){
                $("#slug").val(text);//#slug (campo donde mostrar)
            }
        })
    });
</script>
@endsection