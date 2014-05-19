<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class View 
{
	private $_controlador;
	public function __construct(Request $peticion)
	{
		$this->_controlador = $peticion->getControlador();
	}

	public function renderizar($vista,$item=false)
	{
		$menuContenido = array(
				array(
					'id' => 'inicio',
					'titulo' => 'Inicio',
					'enlace'=>BASE_URL),
				array(
					'id' => 'seguidos',
					'titulo' => 'Seguidos',
					'enlace'=>BASE_URL . 'seguidos'),	
				array(
					'id' => 'seguidores',
					'titulo' => 'Seguidores',
					'enlace'=>BASE_URL . 'seguidores'),
								
				array(
					'id' => 'UsersMicronott',
					'titulo' => 'Users Micronott',
					'enlace'=>BASE_URL."UsersMicronott"),	
				);
			$menuPrincipal = array(
				array(
					'id' => 'login',
					'titulo' => 'Login',
					'enlace'=>BASE_URL . 'index' ),
				array(
					'id' => 'registro',
					'titulo' => 'Register',
					'enlace'=>BASE_URL . 'registro'),
				array(
					'id' => 'visita',
					'titulo' => 'Visitante',
					'enlace'=>BASE_URL . 'visitante'),
				);
		if(Session::get('autenticado'))
		{
			
			$menu[] = array(
					'id' => 'login',
					'titulo' => 'Cerrar Sesion',
					'enlace'=>BASE_URL . 'index/cerrar');
		}
		else
		{

			$menu[] = array(
					'id' => 'login',
					'titulo' => 'Iniciar Sesion',
					'enlace'=>BASE_URL . 'index');
		}
		if($item!='post' && $item!='visitante' ){
		$_layoutParams = array(
			'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
			 'ruta_img' =>  BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/imagenes/',
			 'ruta_js' =>   BASE_URL .'views/layout/' . DEFAULT_LAYOUT . '/js/',
			 'menuContenido'=>$menuContenido,
			 'menuPrincipal' =>$menuPrincipal
			);

		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
		if(is_readable($rutaView))
		{
			include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
			include_once $rutaView;
			include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
		}
		else
		{
			throw new Exception ('Error de vista');
		}
		}
		else if ($item === 'post')
		{
			$_layoutParams = array(
			'ruta_css' => BASE_URL . 'views/layout/' . CONTENIDO_LAYOUT . '/css/',
			 'ruta_img' =>  BASE_URL . 'views/layout/' .CONTENIDO_LAYOUT . '/imagenes/',
			 'ruta_js' =>   BASE_URL .'views/layout/' . CONTENIDO_LAYOUT. '/js/',
			 'menuContenido'=>$menuContenido,
			 'menuPrincipal' =>$menuPrincipal
			);

		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
		if(is_readable($rutaView))
		{
			include_once ROOT . 'views' . DS . 'layout' . DS . CONTENIDO_LAYOUT . DS . 'header.php';
			include_once $rutaView;
			include_once ROOT . 'views' . DS . 'layout' . DS . CONTENIDO_LAYOUT . DS . 'footer.php';
		}
		else
		{
			throw new Exception ('Error de vista');
		}
		}
		else if ($item === 'visitante')
		{
			$_layoutParams = array(
			'ruta_css' => BASE_URL . 'views/layout/' . VISITANTE_LAYOUT . '/css/',
			 'ruta_img' =>  BASE_URL . 'views/layout/' .VISITANTE_LAYOUT . '/imagenes/',
			 'ruta_js' =>   BASE_URL .'views/layout/' . VISITANTE_LAYOUT. '/js/',
			);

		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
		if(is_readable($rutaView))
		{
			include_once ROOT . 'views' . DS . 'layout' . DS . VISITANTE_LAYOUT . DS . 'header.php';
			include_once $rutaView;
			include_once ROOT . 'views' . DS . 'layout' . DS . VISITANTE_LAYOUT . DS . 'footer.php';
		}
		else
		{
			throw new Exception ('Error de vista');
		}
		}
	}
	}

?>
