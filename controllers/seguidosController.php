<?php


class seguidosController extends Controller
{
	private $_following;
    private $_insertarFotos;
    private $_conteocomentarios;
    private $_conteoseguidos;

	public function __construct()
	{
		parent::__construct();
		$this->_following = $this->loadModel('postSeguidos');
        $this->_insertarFotos = $this->loadModel('insertarFotos');
        $this->_conteocomentarios=$this->loadModel('countParams');
        $this->_conteoseguidos=$this->loadModel('countParams');
	}
    public function index()
    {
        $this->_view->conteocomentarios=$this->_conteocomentarios->contarComentarios(Session::get('idUser'));
        $this->_view->conteoseguidos=count($this->_following->userOfFollower(Session::get('idUser')));
        $this->_view->conteoseguidores = count($this->_following->userOfFollowing(Session::get('idUser')));
    	if(!empty(Session::get('idUser')))
    	{
    		$this->_view->titulo = 'Seguidos';
    		$this->_view->usuariosencontrados = $this->_following->userOfFollowing(Session::get('idUser'));
            $this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
        	$this->_view->renderizar('seguidos','post');
    	}
    	else
    	{
    		$this->redireccionar();
    	}
    	
    }
}

?>