<?php 

require 'app/model/class_login.php';
require 'app/model/conexion_register_ajax_class.php';
require 'app/model/class.conexion_registroUsuario.php';
class mvc_controller
{
	function irLogin()
	{
		$sesion_iniciada = $this->login_check();
		if($sesion_iniciada)
		{
			$this->contenido();
		}
		else
		{
			$html = $this->load_page('app/views/default/login.php');
			$this->view_page($html);
		}
	}

	function irRegister()
	{
		$html = $this->load_page('app/views/default/register.html');
		$this->view_page($html);
	}

	function analizarLoginAjax($user,$password)
	{
		$nuevoSingleton = Login::singleton_login();
		$usuario = $nuevoSingleton->login_users($user,$password);
		if($usuario == TRUE)
    	{
     		echo '2';
    	}

    	else
    	{
    		echo '3';
    	}
	}
	function analizarRegisterAjax($email)
	{
		$nuevoSingleton = Register_Ajax::singleton_login();
		$email = $nuevoSingleton->register_mail($email);
		if($email == TRUE)
    	{
     		echo 'usuario ya registrado';
    	}

    	else
    	{
    		echo 'usuario no registrado';
    	}

	}
	function analizarRegisterAjax_nickName($nickName)
	{
		$nuevoSingleton = Register_Ajax::singleton_login();
		$nickName = $nuevoSingleton->register_nickName($nickName);
		if($nickName == TRUE)
    	{
     		echo 'usuario ya registrado';
    	}

    	else
    	{
    		echo 'usuario no registrado';
    	}
	}

	function registrarUsuario($fname,$lname,$nickname,$email,$password,$password2)
	{
		$nuevoSingleton = RegisterUser::singleton_login();
		$insertValid = $nuevoSingleton->register_user($fname,$lname,$nickname,$email,$password,$password2);
		echo $insertValid;
	}

	function analizarLogin($user,$password)
	{
		$nuevoSingleton = Login::singleton_login();
		$usuario = $nuevoSingleton->login_users($user,$password);
		if($usuario == TRUE)
    	{
     		$this->contenido();
     		#header('location:app/views/default/contenido.html');
    	}

    	else
    	{
    		$this->principal();
    	}
	}
	
	function principal()
	{
		# lo comentado hacia que la pagina principal fuese la de contenido 
		#$pagina=$this->load_template('Pagina Principal MVC');				
		#$html = $this->load_page('app/views/default/modules/m.principal.php');
		#$pagina = $this->replace_content('/\#SECTION\#/ms' ,$html , $pagina);
		#$this->view_page($pagina);
		$html = $this->load_page('app/views/default/login.php');
		$this->view_page($html);
	}

	function contenido()
	{
		$this->sec_session_start();
		$pagina=$this->load_template('Pagina Principal MVC');				
		$html = $this->load_page('app/views/default/modules/m.principal.php');
		$pagina = $this->replace_content('/\#SECTION\#/ms' ,$html , $pagina);
		
			  $this->view_page($pagina);
			
		
		#header('location:app/views/default/contenido.html');
	}

	function load_template($title='Sin Titulo'){
		$pagina = $this->load_page('app/views/default/page.php');
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$nav = $this->load_page('app/views/default/sections/s.nav.php');
		$footer = $this->load_page('app/views/default/sections/s.footer.php');
		$aside = $this->load_page('app/views/default/sections/s.aside.php');
		$pagina = $this->replace_content('/\#HEADER\#/ms' ,$header , $pagina);
		$pagina = $this->replace_content('/\#NAV\#/ms' ,$nav , $pagina);				
		$pagina = $this->replace_content('/\#ASIDE\#/ms' ,$aside , $pagina);
		$pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer , $pagina);
		return $pagina;
	}

	private function load_page($page)
	{
		return file_get_contents($page);
	}

	private function view_page($html)
	{
		echo $html;
	}

	private function replace_content($in='/\#SECTION\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}

	private function sec_session_start() {
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
   private function login_check()
   {
   	if (isset($_SESSION['user_id'], $_SESSION['username']))
   	{
   		return TRUE;
   	}
   	else
   	{
   		return FALSE;
   	}
   }

}


 ?>