<?php


class visitanteController extends Controller
{
	private $_cargarUsuarios;
	public function __construct()
	{
		parent::__construct();
		$this->_cargarUsuarios = $this->loadModel('cargarUsuarios');
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