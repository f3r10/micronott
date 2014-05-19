<?php 
class errorController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->_view->titulo = 'Error';
		$this->_view->mensaje = $this->_getError();
		$this->_view->renderizar('index');
	}

	public function access($codigo)
	{

		$this->_view->titulo = 'Error';
		$this->_view->mensaje = $this->_getError($codigo);
		$this->_view->renderizar('access');
	}

	private function _getError($codigo = false)
	{
		$error['default'] = 'Ha ocurrido un error y la pagina no mostrarse';
		$error['5050'] = 'Acceso restringido';
		$error['8080'] = 'tiempo de la sesion agotado';
		if($codigo)
		{
			if(array_key_exists($codigo, $error))
			{
				return $error[$codigo];
			}
			else
			{
				return $error['default'];
			}
		}
		else
		{
			return $error['default'];
		}
		
	}
}
 ?>