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
        $validarNick = true;
        $validarMail = true;
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
                if ($this->getPostParam('nickname'))
                {
                    if($this->_registro->verificarUsuario($this->getPostParam('nickname')))
                    {
                        $validarNick = false;
                        $this->_view->usuariosencontrados = $this->_registro->verificarUsuario($this->getPostParam('nickname'));
                        
                    }

                }
                if ($this->getPostParam('email'))
                {
                    if($this->_registro->verificarMail($this->getPostParam('email')))
                    {
                        $validarMail = false;
                        
                        $this->_view->mailencontrado = $this->_registro->verificarMail($this->getPostParam('email')); 
                    }
                    
                    
                }
                else
                {
                     if($validarMail && $validarNick)
                     {
                        if($this->_registro->registrarUsuario($this->getPostParam('name'),$this->getPostParam('lastname'),$this->getPostParam('nickname'),$this->getPostParam('email'),$this->getPostParam('password')))
                     {
                        $this->view->_mensaje = 'Registro completo';
                        //$this->redireccionar();
                     }
                     }
                     else
                        {   
                            
                        }
                     
                }
                

            }
            $this->_view->renderizar('registro');
        }
        
        
    }
}

?>