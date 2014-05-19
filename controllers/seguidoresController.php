<?php


class seguidoresController extends Controller
{
	private $_following;
	public function __construct()
	{
		parent::__construct();
		$this->_following = $this->loadModel('postSeguidos');
	}
    public function index()
    {
    	if(!empty(Session::get('idUser')))
    	{
    		$this->_view->titulo = 'Seguidores';
    		$this->_view->usuariosencontrados = $this->_following->userOfFollower(Session::get('idUser'));
        	$this->_view->renderizar('seguidores','post');
    	}
    	else
    	{
    		$this->redireccionar();
    	}
    	
    }
}

?>