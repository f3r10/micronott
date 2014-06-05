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
                      
                        if(count($this->_registro->verificarUsuario($this->getPostParam('nickname')))>1)
                        {
                            $validarNick = false;
                            $this->usuariosencontrados=1;
                            echo "usuario ya registrado";
                        }
                        else
                        {
                            $validarNick = true;
                            $this->usuariosencontrados=0;
                        }
                        
                    

                }
                if ($this->getPostParam('email'))
                {
                    
                        if(count($this->_registro->verificarMail($this->getPostParam('email')))>1)
                        {
                            $validarMail = false; 
                            $this->mailencontrado=1;
                            echo "mail ya registrado";
                        }
                        else
                        {
                            $validarMail = true;
                            $this->mailencontrado=0;
                        }
                    
                    
                    
                }
                else
                {
                     if($validarMail && $validarNick)
                     {
                        if($this->_registro->registrarUsuario($this->getPostParam('name'),$this->getPostParam('lastname'),$this->getPostParam('nickname'),$this->getPostParam('email'),$this->getPostParam('password')))
                     {
                        $this->view->_mensaje = 'Registro completo';
                        $this->redireccionar();
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