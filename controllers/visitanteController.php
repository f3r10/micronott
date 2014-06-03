<?php


class visitanteController extends Controller
{
	private $_cargarUsuarios;
    private $_perfil;
    private $_insertarFotos;
	public function __construct()
	{
		parent::__construct();
		$this->_cargarUsuarios = $this->loadModel('cargarUsuarios');
        $this->_perfil = $this->loadModel('profile');
        $this->_insertarFotos = $this->loadModel('insertarFotos');
	}
    public function index()
    {
    	$this->_view->titulo = 'Visitante';
    	$this->_view->usuariosencontrados=$this->_cargarUsuarios->cargarUsuariosVisitante();
    	
        $this->_view->renderizar('visitante','visitante');
    }

    public function verPerfil()
    {
    	 $this->_view->nombreUsuarioMicronott = $this->getPostParam('nickname');
         $this->_view->foto = $this->_insertarFotos->getPhoto($this->getPostParam('usuario'));
         $this->_view->profile = $this->_perfil->getDescripcion($this->getPostParam('usuario'));
    	 $this->_view->titulo = 'Visitante';
    	 $this->_view->renderizar('perfil','visitante');
    }

    public function cerrar()
    {
    	Session::destroy();
    	$this->redireccionar('registro');
    }
}

?>