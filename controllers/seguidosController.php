<?php


class seguidosController extends Controller
{
	private $_following;
    private $_insertarFotos;
	public function __construct()
	{
		parent::__construct();
		$this->_following = $this->loadModel('postSeguidos');
        $this->_insertarFotos = $this->loadModel('insertarFotos');
	}
    public function index()
    {
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