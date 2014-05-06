<?php 

require 'app/model/class_login.php';
require 'app/model/conexion_register_ajax_class.php';
require 'app/model/class.conexion_registroUsuario.php';
@session_start();
class mvc_controller
{
	function irLogin()
	{
		$html = $this->load_page('app/views/default/login.php');
		$this->view_page($html);
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
		
		foreach ($insertValid as $row)
		{
			echo $row['iduser'];
		}
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
}


 ?>