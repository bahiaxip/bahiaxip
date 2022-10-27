@extends("layouts.app")
@section("title","$post->title")

@section("content")
{{--
<style>
    a:hover{
        text-decoration:none;
    }
    
</style>
--}}
<div class="container minim post">
    <div class="row py-1">
        <div class="col-auto">
            <a href="javascript:history.back()" title="Volver" ><span style="font-size:18px;font-weight:bold;display:inline-flex;vertical-align:middle">&#x021A9;</span></a>
            <a  class="btn_category"  href="{{ route("category",$post->category->slug) }}"><span class="post_detail_category_name">{{ $post->category->name }}</span></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card box_card ">
                <p class="card-header card-success-outline post_detail_header ">
                    {{ $post->title }}
                </p>
                @if($post->file && $post->file != "NULL")
                        <img src="{{asset($post->file) }}" class="card-image-top img-fluid mx-auto mb-4 " >
                @endif
                
                <div class="card-block">
                    <div class="card-title post_detail_bodymain">
                        <p><?php echo $post->body_main; ?></p>                        
                    </div>
<!-- añadimos el tag v-pre para que las dobles llaves no generen conflicto con Vue (integrado en Laravel Mix)-->
                    <div class="card-text mt-5 post_detail_bodyplus" v-pre>
                        {{--<p><?php echo $post->body_plus; ?></p>--}}
                        <p>{!!$post->body_plus!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col-auto ">
            <!--<div class="card ">
                <div class="card-block  ">                    -->
                    <!--<h6 class="card-header tagTitle_post text-white text-center">Etiquetas</h6>-->

                    <p class="card-text tag_post mt-3">
                    <!--<ul class="tag_post">-->
                    @foreach($post->tags as $tag)
                    
                        <button class="btn  mb-2">
                            <a href="{{ route("tag",$tag->slug) }}" >
                            {{ $tag->name }}
                            </a>
                        </button>
                    
                    @endforeach
                    <!--</ul>-->
                    </p>
                <!--</div>
            </div>-->
        </div>
        
    </div>
    {{--
    <div class="row comentarios justify-content-center mt-4">
        <div class="col-6">
            <h5>Comentarios: {{ $comment->count() }}</h5>
                
                    @if(auth()->user())
                        {{ Form::open(["route"=>"comments.store","name"=>"hola", "class"=>"form_comentarios d-flex justify-content-end flex-wrap"]) }}
                            {{ Form::hidden("user_id",auth()->user()->id) }}
                            {{ Form::hidden("post_id",$post->id) }}
                            {{ Form::textarea("body",null,["placeholder"=>"Comentario"]) }}
                            <button type="submit" class="btn btn-primary boton_comentar">Comentar</button>
                        {{ Form::close() }}
                    @else
                        <p>Para poder comentar es necesario iniciar sesión</p>
                    @endif
                
                <hr>
            @foreach($comment as $com)
                <div class="media">                
                    <img src="{{ asset("ima/help.png") }}" width="64" height="64">
                    <div class="media-body">                        
                        <p class="com_nombre">{{ $com->user->name }}<span>{{ $com->created_at }}</span></p>
                        <p class="com_comentario">{{ $com->body }}</p>
                        @if(auth()->user())
                        
                        <div class="text-right">
                            <button class="btn btn-default btn-sm" onclick="showTextarea(this)">Responder</button>
                        </div>
                        <div class="media comment_resp">
                            {{ Form::open(["route"=>"comments.store","class"=>"form_comentarios d-flex justify-content-end flex-wrap"]) }}
                                {{ Form::hidden("user_id",auth()->user()->id) }}
                                {{ Form::hidden("post_id",$post->id) }}
                                {{ Form::hidden("resp",$com->id) }}
                                {{ Form::textarea("body",null,["placeholder"=> "Responder"]) }}
                                <button type="submit" class="btn btn-primary boton_comentar">Responder</button>
                            {{ Form::close() }}
                        </div>
                        
                        @endif
                        
                        @foreach($com->respComments as $resp)
                        
                        <div class="media">
                            <img src="{{ asset("ima/help.png") }}" width="64" height="64">
                            <div class="media-body">
                                    <p class="com_nombre">{{ $resp->user->name }}<span>{{ $resp->hora }}</span></p>
                                    <p class="com_comentario">{{ $resp->body }}</p>                        
                            </div>
                        </div>
                        
                        @endforeach                        
                                                
                        <!--<div class="media">
                            <img src="{{ asset("ima/help.png") }}" width="64" height="64">
                            <div class="media-body">
                                <p class="com_nombre">Manuel Soria<span>21:39pm</span></p>
                                <p class="com_comentario">construir la plantilla sin el app.css que trae laravel (por defecto) no me mantiene los estilos de bootstrap , es decir,
            los puedo crear mediante bootstrap pero no directamente con el método render(),al incorporar de nuevo el app.css me da problemas la cabecera,
            por esa razón he tenido</p>                        
                            </div>
                        </div>
                        <div class="media">
                            <img src="{{ asset("ima/help.png") }}" width="64" height="64">
                            <div class="media-body">
                                <p class="com_nombre">Manuel Soria<span>21:39pm</span></p>
                                <p class="com_comentario">construir la plantilla sin el app.css que trae laravel (por defecto) no me mantiene los estilos de bootstrap , es decir,
            los puedo crear mediante bootstrap pero no directamente con el método render(),al incorporar de nuevo el app.css me da problemas la cabecera,
            por esa razón he tenido</p>                        
                            </div>
                        </div>-->
                    </div>
                    

                </div>
             
            @endforeach
        </div>
    </div>
    --}}
    
        
        
        
</div>
     
     
<!--<div class="row mt-2 align-items-start">
    <div class="col-8 text-center h2 ">
        
    </div>
    <div class="col-4 bg-primary text-white text-center pt-2 ">
        <h4>Categoría</h4>
    </div>
</div>
<div class="row ">
    <div class="col-8 ">
        {{ $post->body }}
    </div>
    <div class="col-4  text-center  pt-2 ">
        <a href="{{ route("category",$post->category->slug) }}"<h6>{{ $post->category->name }}</h6>
    </div>
</div>




<div class="row justify-content-end">
    <div class="col-4  ">
        <h4 class="text-center bg-primary text-white ">Etiquetas</h4>
        @foreach($post->tags as $tag)
        <button class="btn">
        <a href="{{ route("tag",$tag->slug) }}" >
        {{ $tag->name }}
        </a></button>
        @endforeach
    </div>
</div>
-->
    <!-- prueba textarea con opciones con ckeditor anulado-->
    <!--<textarea class="ckeditor" name="editor" id="editor" rows="10" cols="80">
        Esto es un textarea ckeditor
        
    </textarea>-->
    
@endsection
<script>
    
</script>