@extends('layouts.app')

@section('content')

<div class="container contact">
	<div class="row mtop16">
		<div class="col">
			<h2>¿Como contactar conmigo?</h2>
			<p>Puedes contactar conmigo por los distintos medios que se indican a continuación.</p>
			<ul>
				<li><span>Blog:</span> Rellenar el formulario y pulsar Enviar</li>
				<li><span>Correo personal:</span> <a href="mailto:fernandogomezespin@gmail.com">fernandogomezespin@gmail.com</a> </li>
				<li>					
					<span>Linkedin:</span>
					<a style="text-decoration:none" target="__blank" href="https://www.linkedin.com/in/bahiaxip/"><i class="fa-brands fa-linkedin" style="font-size:1.5em"></i></a>
				</li>
				
				
			</ul>
		</div>
	</div>
	<div class="row mtop16">
		<div class="col">
			{{Form::label('name','Nombre')}}
			{{Form::text('name',null,['class' => 'form-control'])}}
		</div>		
	</div>
	<div class="row mtop16">
		<div class="col">
			{{Form::label('email','E-Mail')}}
			{{Form::email('email',null,['class' => 'form-control'])}}
		</div>
	</div>
	<div class="row mtop16">
		<div class="col">
			{{Form::label('subject','Asunto')}}
			{{Form::text('subject',null,['class' => 'form-control'])}}
		</div>
	</div>
	<div class="row mtop16">
		{{Form::label('description','Descripción')}}
		<div class="col-12">
			{{Form::textarea('description',null,null,['class' => 'form-control'])}}
		</div>
	</div>
	<div class="row mtop16">
		<div class="col">
		    <button class="btn btn_pry">Enviar</button>
		</div>
	</div>
</div>

@endsection