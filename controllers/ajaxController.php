<?php
class ajaxController extends Controller
{
	private $_retweet;
    private $_registro;
	public function __construct()
	{
		parent::__construct();
        $this->_retweet = $this->loadModel('post');
        $this->_registro = $this->loadModel('registro');
        

		
	}
    public function index()
    {
    	if(!empty(Session::get('idUser')))
    	{
    		if($this->getPostParam('value')==1)
            {
                $idPost = $this->_retweet->getIdPost($this->getPostParam('post'));
                $idOwner = $this->_retweet->getIdUserOwner($this->getPostParam('userCompa'));
                $setRetweet = $this->_retweet->setRetweet($idPost['idpost'],$idOwner['iduser'],Session::get('idUser'));
                print_r( $setRetweet);
            }
    	}
    	else
    	{
    		
    	}
    	
    }


    public function email()
    {
        if ($this->getPostParam('email'))
                {
                    
                        if(count($this->_registro->verificarMail($this->getPostParam('email')))>1)
                        {
                            $validarMail = false; 
                            $this->mailencontrado=1;
                            echo "mail ya existe";
                        }
                        else
                        {
                            $validarMail = true;
                            $this->mailencontrado=0;
                            echo "mail no exite";
                        }
                    
                    
                    
                }
    }

    public function nickname()
    {
        if ($this->getPostParam('nickname'))
                {
                      
                        if(count($this->_registro->verificarUsuario($this->getPostParam('nickname')))>1)
                        {
                            $validarNick = false;
                            $this->usuariosencontrados="usuario encontrado";
                            echo "usuario ya exite";
                        }
                        else
                        {
                            $validarNick = true;
                            $this->usuariosencontrados=0;
                            echo "usuario no exite";
                        }
                        
                    

                }
    }
}

?>