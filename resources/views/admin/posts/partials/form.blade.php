{{ Form::hidden("user_id",auth()->user()->id) }}

@isset($post)
    @if($post && $post->id)
        {{ Form::hidden("postId", $post->id ) }}
    @else
        {{ Form::hidden("postId") }}
    @endif
@endisset

<div class="form-group mtop16">
    {{ Form::label("category_id", "Categorías") }}
    {{ Form::select("category_id", $categories, null, ["class" => "form-control"]) }}
</div>

<div class="form-group mtop16">
    {{ Form::label("name", "Nombre de la entrada") }}
    {{ Form::text("title",null, ["class" => "form-control","id"=> "name"]) }}
</div>
<div class="form-group mtop16">
    {{ Form::label("slug", "URL Amigable") }}
    {{ Form::text("slug",null, ["class" => "form-control","id"=> "slug"]) }}
</div>
<div class="form-group mtop16">
    <label for="status">Estado</label>
    {{ Form::select('statusint',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select'])}}
</div>

<div class="form-group mtop16">
    {{ Form::label("tags", "Etiquetas") }}
    <div>
        @foreach($tags as $tag)
        <label>
            {{ Form::checkbox("tags[]", $tag->id) }} {{ $tag->name }} 
        </label>
        @endforeach
    </div>
    
</div>
<div class="form-group mtop16">
    {{ Form::label("body_main", "Contenido Principal") }}
    <!--<div id="summernote" name="body" id="body"></div>-->
    
    {{ Form::textarea("body_main",null, ["class" => "form-control","rows" => "10", "cols" => "80","spellcheck"=>"true"]) }}
</div>
{{-- añadimos la etiqueta v-pre para que no genere error la doble llave con Vue(integrado en Laravel Mix )--}}
<div class="form-group mtop16">
    {{ Form::label("body_plus", "Contenido") }}
    <!--<div id="summernote" name="body" id="body"></div>-->
    {{ Form::textarea("body_plus",($post) ? htmlspecialchars($post->body_plus): null, ["class" => "form-control","id"=> "body_plus","rows" => "10", "cols" => "80","spellcheck"=>"false",'v-pre']) }}
    
</div>
<div class="form-group mtop16">
    {{ Form::label("file", "Imagen") }}
    {{ Form::file("file") }}
</div>
<!--<div class="form-group">
    {{ Form::label("status", "Estado") }}
    <label>
        {{ Form::radio("status", "PUBLISHED") }} Publicado
    </label>
    <label>
        {{ Form::radio("status", "DRAFT") }} Borrador
    </label>
</div>-->
<div class="form-group mtop16">
   {{-- 
   {{ Form::submit("Guardar", ["class" => "btn btn-sm btn-primary","onclick"=>"guardar(this,event)"]) }}
   --}}
   {{ Form::submit("Guardar", ["class" => "btn btn-sm btn-primary"]) }}
</div>
<!--<button class="" type="button" onclick="listImg();">Mostrar Imagenes</button>-->
<!--<button class="" type="button" onclick="llamar();">Mostrar Imagenes</button>-->

@section("scripts")
<script src="{{ asset("js/stringToSlug/jquery.stringToSlug.min.js") }}"></script>
<script type="text/javascript">
        
        /*
        CKEDITOR.instances.body_plus.on('change',function(e){
            
            @this.detail=this.getData();
            console.log("getData: ",this.getData)
            if(this.getData() == ""){
              console.log("description es null")
            }
            
        });
        */
    </script>
<script>
    //crea slug automáticamente a medida que se escribe el nombre
    $(document).ready(function()
    {
        $("#name, #slug").stringToSlug({//#name y #slug (campos donde recoger)
            callback: function(text){
                $("#slug").val(text);//#slug (campo donde mostrar)
            }
        });

        //editor_init('body_plus');
        
        /*
        PARA MODIFICAR LAS OPCIONES IR A:
         https://ckeditor.com/latest/samples/toolbarconfigurator/index.html#advanced
        */
        CKEDITOR.replace('body_plus',{
            //language: '{{app()->getLocale()}}',
            language: 'es',
            filebrowserUploadUrl:'/uploaded',
            fileTools_requestHeaders:{
                'X-Requested-With':'XMLHttpRequest',
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
            
            
            toolbar:[
                /*no funciona el copy/paste en algunos navegadores*/
                /* 
                { name:'clipboard', items:['Cut','Copy','Paste','PasteText','-','Undo','Redo']},
                */
               
                { name: 'paragraph', items:['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']},
                //{ name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Image','Link','Unlink','Blockquote']},
                //eliminamos 'Image','Link' y 'Unlink' temporalmente
                { name: 'basicstyles',items:['Bold','Italic','UnderLine','Strike','NumberedList','BulletedList','Blockquote']},
                {name: 'links', items:['Link']},
                { name:'styles', items:['Font','FontSize','Format']},
                
                {name:'colors', items:['TextColor','BGColor']},
                { name: 'document', items:['CodeSnippet','EmojiPanel','Preview','Source']},
                { name:'insert', items:['Image']},
                

            ],
            
            
            /*
            toolbar:[
                {name: 'colors',items:['TextColor','BGColor']}
            ],
            */
            extraPlugins:['codesnippet','colorbutton','font','justify','basicstyles'],
            codeSnippet_theme: 'monokai_sublime',
            format_tags : 'p;h1;h2;h3;h4',
            
        });
        
        //implementación del editor de código summernote y sus opciones
        {{--
        $("#summernote").summernote({
                    //height:200,
                    tabsize:2,                    
                    //close prettify Html                    
                    prettifyHtml: true,
                    toolbar:[
                    //excluimos el apartado style ya que con el apartado fontsize no tiene efecto
                        ['para', [/*"style",*/'ul', 'ol', 'paragraph']],
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        //['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ["color", ["color"]],
                        ["insert",["picture","video","link"]],
                        ["misc",["codeview"]],
                        //["link",["linkDialogShow","unlink"]],
                        ["misc",["fullscreen"]],                      
                        ["highlight",["highlight"]],                      
                        //['height', ['height']]
                    ],     
                    lang:"es-ES"
                });
        --}}        
        //almacenamos el contenido del textarea summernote que nos trae para después poder 
        //comparar con testSumernote()
        {{--
        valSumernote=document.getElementById("summernote").value;        
        eliminarHighlight() //detecta click derecho sobre ventana highlight para poder eliminar
        //PR.prettyPrint();
        --}}
    });
</script>
@endsection
