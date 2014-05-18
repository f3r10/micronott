<?php


class UsersMicronottController extends Controller
{
	private $_cargarUsuarios;
	private $_post;
	private $_regSeguidor;
	private $_nickname;
	private $_idUsuario;

	public function __construct()
	{
		parent::__construct();
		$this->_cargarUsuarios = $this->loadModel('cargarUsuarios');
		$this->_post = $this->loadModel('post');
		$this->_regSeguidor =$this->loadModel('seguir');
	}
    public function index()
    {
    	$this->_view->titulo = 'Users Micronott';
        
		$this->_view->usuariosencontrados=$this->_cargarUsuarios->cargarUsuarios(Session::get('idUser'));
		
		$this->_view->renderizar('UsersMicronott','post');
		
    }
	
	public function user()
	{
		if(!empty(Session::get('idUser')))
		{
			$this->_idUsuario = $this->getInt('usuario');
			$this->_nickname = $this->getText('nickname');
			echo $this->_idUsuario;
			echo $this->_nickname;
			$this->_view->post=$this->_post->getPost($this->getInt('usuario'));
			$this->_view->renderizar('cargarUsuario','post');
		
		
		
		}
	}

	

	
	
}

?>