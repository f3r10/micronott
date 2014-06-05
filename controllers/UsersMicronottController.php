<?php


class UsersMicronottController extends Controller
{
	private $_cargarUsuarios;
	private $_post;
	private $_regSeguidor;
	private $_nickname;
	private $_idUsuario;
	private $_insertarFotos;
	private $_conteocomentarios;
    private $_conteoseguidos;
    private $_following;

	public function __construct()
	{
		parent::__construct();
		$this->_cargarUsuarios = $this->loadModel('cargarUsuarios');
		$this->_post = $this->loadModel('post');
		$this->_regSeguidor =$this->loadModel('seguir');
		$this->_insertarFotos = $this->loadModel('insertarFotos');
		$this->_conteocomentarios=$this->loadModel('countParams');
        $this->_conteoseguidos=$this->loadModel('countParams');     
        $this->_following = $this->loadModel('postSeguidos');
	}
    public function index()
    {
	$this->_view->conteocomentarios=$this->_conteocomentarios->contarComentarios(Session::get('idUser'));
        $this->_view->conteoseguidos=count($this->_following->userOfFollower(Session::get('idUser')));
        $this->_view->conteoseguidores = count($this->_following->userOfFollowing(Session::get('idUser')));
    	if(!empty(Session::get('idUser')))
        {
    	$this->_view->titulo = 'Users Micronott';
        
		$this->_view->usuariosencontrados=$this->_cargarUsuarios->cargarUsuarios(Session::get('idUser'));
		$this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
		
		$this->_view->renderizar('UsersMicronott','post');
		}
		else
		{
			$this->redireccionar();
		}

		
    }
	
	public function user()
	{
		if(!empty(Session::get('idUser')))
		{
			$this->_idUsuario = $this->getInt('usuario');
			$this->_nickname = $this->getText('nickname');
			$this->_view->post=$this->_post->getPost($this->getInt('usuario'));
			$this->_view->renderizar('cargarUsuario','post');
		
		
		
		}
		else
		{
			$this->redireccionar();

		}
	}

	

	
	
}

?>