<?php


class seguidosController extends Controller
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
    		$this->_view->titulo = 'Seguidos';
    		$this->_view->usuariosencontrados = $this->_following->userOfFollowing(Session::get('idUser'));
        	$this->_view->renderizar('seguidos','post');
    	}
    	else
    	{
    		$this->redireccionar();
    	}
    	
    }
}

?>