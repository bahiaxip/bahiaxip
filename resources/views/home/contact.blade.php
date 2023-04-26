@extends('layouts.app')
@section('title','Contacto')
@section('content')
<div class="wrap_contact">
	<div class="box_contact">
        
    	<div class="contact">
    		<div class="row ">
    			<div class="col">
    				<h2>CONTÁCTAME</h2>
    				{{--
    				<p>Puedes contactar conmigo por los distintos medios que se indican a continuación.</p>
    				<ul>
    					<li><span>Blog:</span> Rellenar el formulario y pulsar Enviar</li>
    					<li><span>Correo personal:</span> <a href="mailto:fernandogomezespin@gmail.com">fernandogomezespin@gmail.com</a> </li>
    					<li>					
    						<span>Linkedin:</span>
    						<a style="text-decoration:none" target="__blank" href="https://www.linkedin.com/in/bahiaxip/"><i class="fa-brands fa-linkedin" style="font-size:1.5em"></i></a>
    					</li>
    				</ul>
    				--}}
    			</div>
    		</div>
    		<div></div>
    		<div class="row form">
    			<div class="col-md-6">
    				<div class="col-md-12 div_input">
    					{{--{{Form::label('name','Nombre')}}--}}
    					{{Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre'])}}	
    				</div>
    				<div class="col-md-12 div_input">
    					
    					{{Form::email('email',null,['class' => 'form-control','placeholder' => 'E-Mail'])}}
    				</div>
    				<div class="col-md-12 div_input">
    					
    					{{Form::text('subject',null,['class' => 'form-control','placeholder' => 'Asunto'])}}
    				</div>
    			</div>
    			<div class="col-md-6 div_input">
    				
    				<div class="col-md-12">
    					<textarea name="description" id="" cols="5" rows="7" class="form-control" placeholder="Descripción"></textarea>
    					
    				</div>
    			</div>
    			<div class="submit">
    			    <button class="btn btn_pry">Enviar Mensaje</button>
    			</div>
    		</div>
    		<div class="row mtop16">
    			
    		</div>
    	</div>
    	<div class="contact2">
            {{--
            <div class="board2">
                <div class="ad">
                    <div id="ad_1" class="ad_1">
                        <img class="slice_1" src="{{asset('/billboard/ad0/slice_01.jpg')}}" alt="Contactar con Gráficas Munda"/>
                        <img class="slice_2" src="{{asset('billboard/ad0/slice_02.jpg')}}"/>
                        <img class="slice_3" src="{{asset('billboard/ad0/slice_03.jpg')}}"/>
                        <img class="slice_4" src="{{asset('billboard/ad0/slice_04.jpg')}}"/>
                        <img class="slice_5" src="{{asset('/billboard/ad0/slice_05.jpg')}}"/>
                        <img class="slice_6" src="{{asset('/billboard/ad0/slice_06.jpg')}}"/>
                        <img class="slice_7" src="{{asset('/billboard/ad0/slice_07.jpg')}}"/>
                        <img class="slice_8" src="{{asset('/billboard/ad0/slice_08.jpg')}}"/>
                        <img class="slice_9" src="{{asset('/billboard/ad0/slice_09.jpg')}}"/>
                        <img class="slice_10" src="{{asset('/billboard/ad0/slice_10.jpg')}}"/>
                        <img class="slice_11" src="{{asset('/billboard/ad0/slice_11.jpg')}}"/>
                        <img class="slice_12" src="{{asset('/billboard/ad0/slice_12.jpg')}}"/>
                        <img class="slice_13" src="{{asset('/billboard/ad0/slice_13.jpg')}}"/>
                        <img class="slice_14" src="{{asset('/billboard/ad0/slice_14.jpg')}}"/>
                        <img class="slice_15" src="{{asset('/billboard/ad0/slice_15.jpg')}}"/>
                        <img class="slice_16" src="{{asset('/billboard/ad0/slice_16.jpg')}}"/>
                        <img class="slice_17" src="{{asset('/billboard/ad0/slice_17.jpg')}}"/>
                        <img class="slice_18" src="{{asset('/billboard/ad0/slice_18.jpg')}}"/>
                        <img class="slice_19" src="{{asset('/billboard/ad0/slice_19.jpg')}}"/>
                        <img class="slice_20" src="{{asset('/billboard/ad0/slice_20.jpg')}}"/>
                        <img class="slice_21" src="{{asset('/billboard/ad0/slice_21.jpg')}}"/>
                        <img class="slice_22" src="{{asset('/billboard/ad0/slice_22.jpg')}}"/>
                    </div>
                    <div id="ad_2" class="ad_2">
                        <img class="slice_1" src="{{asset('/billboard/ad2/slice_01.jpg')}}"/>
                        <img class="slice_2" src="{{asset('/billboard/ad2/slice_02.jpg')}}"/>
                        <img class="slice_3" src="{{asset('/billboard/ad2/slice_03.jpg')}}"/>
                        <img class="slice_4" src="{{asset('/billboard/ad2/slice_04.jpg')}}"/>
                        <img class="slice_5" src="{{asset('/billboard/ad2/slice_05.jpg')}}"/>
                        <img class="slice_6" src="{{asset('/billboard/ad2/slice_06.jpg')}}"/>
                        <img class="slice_7" src="{{asset('/billboard/ad2/slice_07.jpg')}}"/>
                        <img class="slice_8" src="{{asset('/billboard/ad2/slice_08.jpg')}}"/>
                        <img class="slice_9" src="{{asset('/billboard/ad2/slice_09.jpg')}}"/>
                        <img class="slice_10" src="{{asset('/billboard/ad2/slice_10.jpg')}}"/>
                        <img class="slice_11" src="{{asset('/billboard/ad2/slice_11.jpg')}}"/>
                        <img class="slice_12" src="{{asset('/billboard/ad2/slice_12.jpg')}}"/>
                        <img class="slice_13" src="{{asset('/billboard/ad2/slice_13.jpg')}}"/>
                        <img class="slice_14" src="{{asset('/billboard/ad2/slice_14.jpg')}}"/>
                        <img class="slice_15" src="{{asset('/billboard/ad2/slice_15.jpg')}}"/>
                        <img class="slice_16" src="{{asset('/billboard/ad2/slice_16.jpg')}}"/>
                        <img class="slice_17" src="{{asset('/billboard/ad2/slice_17.jpg')}}"/>
                        <img class="slice_18" src="{{asset('/billboard/ad2/slice_18.jpg')}}"/>
                        <img class="slice_19" src="{{asset('/billboard/ad2/slice_19.jpg')}}"/>
                        <img class="slice_20" src="{{asset('/billboard/ad2/slice_20.jpg')}}"/>
                        <img class="slice_21" src="{{asset('/billboard/ad2/slice_21.jpg')}}"/>
                        <img class="slice_22" src="{{asset('/billboard/ad2/slice_22.jpg')}}"/>
                    </div>
                    <div class="billboard"></div> 
                </div>
            </div>
            --}}
            <div class="box_circle">
                
                <div class="circle">
                    <img src="{{asset('icon/email2.svg')}}" alt="">
                </div>
                
            </div>
            <div class="text_email">
                <p>bahiaxip<span>@hotmail.com</span></p>
            </div>
            <div class="div_name">
                <div class="name">Fernando Gómez</div>
                <div class="job_profile">Desarrollador web</div>
            </div>
            
            <div>
                
            </div>
        </div>
	</div>
    <div style="width:100%;align-self:flex-end">
        @include('layouts.footer')
    </div>
</div>

@endsection
@section('scripts')
<script>
    /*
$(function(){
//rotación del billboard
    //se debe contar que si el primer parámetro multiplicado por el número de slides es menor 
    //al timeoute al cabo de un tiempo comienza a descordinarse
    //setTimeout(()=>{
	    $('#ad_1 > img').each(function(i,e){
	       rotate($(this),500,5000,i);
	    });
	//},5000)
});
    //método rotate con jquery
function rotate(elem1,speed,timeout,i){
    elem1.animate({'marginLeft':'18px','width':'0px'},speed,function(){
        var other;
        if(elem1.parent().attr('id') == 'ad_1')
            other = $('#ad_2').children('img').eq(i);
        else
            other = $('#ad_1').children('img').eq(i);
            other.animate({'marginLeft':'0px','width':'36px'},
                              speed,function(){
            var f = function() { rotate(other,speed,timeout,i) };
            setTimeout(f,timeout);
        });
    });
}
*/
</script>
@endsection