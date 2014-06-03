<?php


class cargarUsuarioController extends Controller
{
	private $_post;
	private $_btnParaSeguirUser;
	private $_nickname;
	private $_idUsuario;
	private $_insertarFotos;


	public function __construct()
	{
		parent::__construct();
		$this->_post = $this->loadModel('post');
		$this->_btnParaSeguirUser = $this->loadModel('seguir');
		$this->_insertarFotos = $this->loadModel('insertarFotos');
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
			Session::set('idCompa',$this->getInt('usuario'));
			Session::set('nicknameCompa',$this->getPostParam('nickname'));
			echo Session::get('idCompa');
			echo Session::get('nicknameCompa');
			echo Session::get('idUser');
			$this->_view->post=$this->_post->getPost($this->getInt('usuario'));
			$this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
			$this->_view->renderizar('cargarUsuario','post');
		
		}
		else
		{
			$this->_view->renderizar('visitante','visitante');
		}
		
    }

    public function seguir()
	{

		
		$resultadoSeguir = $this->_btnParaSeguirUser->registrarSeguir(Session::get('idUser'),Session::get('idCompa'),Session::get('nicknameCompa'));
		$this->redireccionar();
	

	}
	
}

?>