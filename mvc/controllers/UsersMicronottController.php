<?php


class UsersMicronottController extends Controller
{
	private $_cargarUsuarios;
	private $_post;


	public function __construct()
	{
		parent::__construct();
		$this->_cargarUsuarios = $this->loadModel('cargarUsuarios');
		$this->_post = $this->loadModel('post');
	}
    public function index()
    {
    	$this->_view->titulo = 'Users Micronott';
        
		$this->_view->usuariosencontrados=$this->_cargarUsuarios->cargarUsuarios();
		
		$this->_view->renderizar('UsersMicronott','post');
		
    }
	
	public function user()
	{
		if(!empty(Session::get('idUser')))
		{
			$this->_view->post=$this->_post->getPost($this->getInt('usuario'));
			$this->_view->renderizar('cargarUsuario','post');
		
		
		
		}
	}
	
}

?>