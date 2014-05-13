<?php


class cargarUsuarioController extends Controller
{
	private $_post;
	private $_btnParaSeguirUser;


	public function __construct()
	{
		parent::__construct();
		$this->_post = $this->loadModel('post');
		$this->_btnParaSeguirUser = $this->loadModel('seguir');
	}
    public function index()
    {
    	if(!empty(Session::get('idUser')))
		{					
			if($this->_btnParaSeguirUser->comprobarSeguimiento(Session::get('idUser'), $this->getInt('usuario')))
			{
				echo $this->getInt('usuario');
				echo Session::get('idUser');
				$this->_view->bottonSeguir = $this->_btnParaSeguirUser->comprobarSeguimiento(Session::get('idUser'), $this->getInt('usuario'));
			}
			
			$this->_view->post=$this->_post->getPost($this->getInt('usuario'));
			$this->_view->renderizar('cargarUsuario','post');
		
		}
		
    }
	
	public function seguir()
	{
		$this->_regSeguidor->registrarSeguir(Session::get('idUser'),$this->getInt('usuario'),$this->getTexto('nickname'));						
	}
	
}

?>