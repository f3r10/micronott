<?php


class indexController extends Controller
{
    private $_login;
    private $_loginAndroid;
	private $_regSeguidor;
    //private $_row;
	public function __construct()
	{
		parent::__construct();
        $this->_login = $this->loadModel('login');
        $this->_loginAndroid = $this->loadModel('loginAndroid');
		$this->_regSeguidor =$this->loadModel('seguir');
		
	}
    public function index()
    {
    	//$post = $this->loadModel('post');
    	//$this->_view->post=$post->getPost();
       
        $this->_view->titulo = 'Login';
        if(empty(Session::get('autenticado')))
        {
            
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getPostParam('username')){
                $this->_view->_error = 'Debe introducir su nombre de usuario';
                $this->_view->renderizar('index');
                exit;
            }
            
            if(!$this->getSql('password')){
                $this->_view->_error = 'Debe introducir su password';
                $this->_view->renderizar('index');
                exit;
            }
            
            $row = $this->_login->getUsuario(
                    $this->getPostParam('username'),
                    $this->getSql('password')
                    );
            
            if(!$row){
                $this->_view->_error = 'Usuario y/o password incorrectos';
                $this->_view->renderizar('index');
                exit;
            }
            else
            {
            Session::set('autenticado',true);
            Session::set('level','usuario');
            Session::set('tiempo',time());
            Session::set('usuario',$row['usrnickname']);
             Session::set('idUser',$row['iduser']);
             print_r($_SESSION);
             $this->redireccionar('post');
            }
            
            }
        }
        else
        {
            $this->redireccionar('post');
        }

           
        
        
       
    	
        $this->_view->renderizar('index');
         //$this->redireccionar('index/mostrar');
    }
    
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }

    public function android()
    {
         if($this->getPostParam('username'))
        {
            //echo  $this->getPostParam('a');
           // echo $this->getPostParam('a');
           $row = $this->_loginAndroid->getUsuario($this->getPostParam('username'),12345);

           if($row)
         {
          echo json_encode($row);
         }
         else
         {
            $response["success"] = 0;
            $response["message"] = "Login incorrect";
            echo json_encode($response);

         }
        
           
        }
         else
         {
            $response["success"] = 0;
            $response["message"] = "Database Error1. Please Try Again!";
            echo json_encode($response);

         }
           
    }
	
	public function seguir()
	{
		$this->_regSeguidor->registrarSeguir(Session::get('idUser'),$this->getInt('usuario'),$this->getTexto('nickname'));
		
				
	}
}

?>