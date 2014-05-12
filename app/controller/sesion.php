<?php 

class Sesion_Init
{
	function sec_session_start() {
        $session_name = 'sec_session_id'; //Configura un nombre de sesión personalizado
                        $secure = false; //Configura en verdadero (true) si utilizas https
                        $httponly = true; //Esto detiene que javascript sea capaz de accesar la identificación de la sesión.
                        ini_set('session.use_only_cookies', 1); //Forza a las sesiones a sólo utilizar cookies.
                        $cookieParams = session_get_cookie_params(); //Obtén params de cookies actuales.
                        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
                        session_name($session_name); //Configura el nombre de sesión a el configurado arriba.
                        session_start(); //Inicia la sesión php
                        session_regenerate_id(true); //Regenera la sesión, borra la previa.
                    }
}



 ?>