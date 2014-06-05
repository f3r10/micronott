<?php


class cargarUsuarioController extends Controller
{
	private $_post;
	private $_btnParaSeguirUser;
	private $_nickname;
	private $_idUsuario;
	private $_insertarFotos;
	private $_perfil;
	private $_following;


		
		
		
        


	public function __construct()
	{
		parent::__construct();
		$this->_post = $this->loadModel('post');
		$this->_btnParaSeguirUser = $this->loadModel('seguir');
		$this->_insertarFotos = $this->loadModel('insertarFotos');
		$this->_perfil = $this->loadModel('profile');
		$this->_conteocomentarios=$this->loadModel('countParams');
        $this->_conteoseguidos=$this->loadModel('countParams');
        $this->_following = $this->loadModel('postSeguidos');
		
	}
    public function index()
    {
    	$this->_view->conteocomentarios=$this->_conteocomentarios->contarComentarios(Session::get('idUser'));
        //print_r($this->_conteocomentarios->contarComentarios(Session::get('idUser')));
        $this->_view->conteoseguidos=count($this->_following->userOfFollower(Session::get('idUser')));

        $this->_view->conteoseguidores = count($this->_following->userOfFollowing(Session::get('idUser')));
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
			$this->_view->post=$this->_post->getPost($this->getInt('usuario'));
			$this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
			$this->_view->fotoUser = $this->_insertarFotos->getPhoto($this->getPostParam('usuario'));
            $this->_view->profile = $this->_perfil->getDescripcion($this->getPostParam('usuario'));
            $this->_view->nombreUsuarioMicronott = $this->getPostParam('nickname');
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