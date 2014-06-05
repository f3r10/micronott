<?php


class seguidoresController extends Controller
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
    		$this->_view->titulo = 'Seguidores';
    		$this->_view->usuariosencontrados = $this->_following->userOfFollower(Session::get('idUser'));
            $this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
        	$this->_view->renderizar('seguidores','post');
    	}
    	else
    	{
    		$this->redireccionar();
    	}
    	
    }
}

?>