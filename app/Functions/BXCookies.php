<?php
//use Illuminate\Http\Request;

//obtenemos cookie y si no existe la creamos asignándole false, es
// decir, si no se ha establecido la cookie de analytics 
//anteriormente o ya expiró, en ese caso, se envía a la vista 
//la variable cookie y así establecemos desactivado por defecto el input switch. Esto solo crea la variable, es decir, no se 
//establece la cookie, para ello sería necesario enviar un return con
//el método withCookie($cookie), pero no es necesario para el input.
function get_cookies(){
	
	return request()->cookie('bx','false');
}
function get_cookie_analytics(){
	return request()->cookie('bahiaxip_analytics','false');
	
}
?>