<?php


class registroController extends Controller
{
    private $_registro;
	public function __construct()
	{
		parent::__construct();
        $this->_registro = $this->loadModel('registro');
	}
    public function index()
    {
    	//$post = $this->loadModel('post');
    	//$this->_view->post=$post->getPost();
    	if((Session::get('autenticado')))
        {
            $this->redireccionar();
        }
        else
        {

            $this->_view->titulo = 'Registro';
            if($this->getInt('enviar') == 1)
            { 
                
                $this->_view->datos = $_POST;
                if(!$this->getPostParam('name'))
                {
                    echo "Debe ingresar su nombre";
                    $this->_view->renderizar('registro');
                }
                 if(!$this->getPostParam('lastname'))
                {
                    echo "Debe ingresar su apellido";
                    $this->_view->renderizar('registro');
                }
                if (!$this->getAlphaNum('nickname'))
                {
                    echo  $this->getAlphaNum('nickname');
                    $this->_view->renderizar('registro');
                }
                if ($this->_registro->verificarUsuario($this->getAlphaNum('nickname')))
                {
                    $this->_view->usuariosencontrados = $this->_registro->verificarUsuario($this->getAlphaNum('nickname'));
                    //echo "existe el usuario";
                    //exit;

                }
                if ($this->_registro->verificarMail($this->getPostParam('email')))
                {
                    $this->_view->mailencontrado = $this->_registro->verificarMail($this->getPostParam('email'));
                    /*echo  "exite el mail";
                    exit;*/
                }
                else
                {
                     
                     if($this->_registro->registrarUsuario($this->getPostParam('name'),$this->getPostParam('lastname'),$this->getAlphaNum('nickname'),$this->getPostParam('email'),$this->getPostParam('password')))
                     {
                        $this->view->_mensaje = 'Registro completo';
                        $this->redireccionar();
                     }
                }
                

            }
            $this->_view->renderizar('registro');
        }
        
        
    }
}

?>