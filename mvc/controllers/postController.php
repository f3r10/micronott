<?php


class postController extends Controller
{
    private $_post;
	public function __construct()
	{
		parent::__construct();
        $this->_post = $this->loadModel('post');
	}
    public function index()
    {
      if(!empty(Session::get('idUser')))
      {
        $this->_view->post=$this->_post->getPost(Session::get('idUser'));
      $this->_view->titulo = 'Contenido';
         $this->_view->renderizar('index', 'post');
        if( $this->getTexto('comment')!==' ' && $this->getTexto('comment') !== 0 )
        {
            //$this->_view->prueba = $this->getTexto('comment');
            
             if($this->nuevoPost())
             {
                $this->redireccionar('post');
             }
            exit;
           
        }
        else
        {
            $this->_view->prueba = "Debe ingresar contendio en el campo";
            exit;
        }
      }
      else
      {
        $this->redireccionar();
      }
    	
       
    }

    public function nuevoPost()
    {
      Session::accesoEstricto(array('usuario'));
       $this->_view->titulo = 'Nuevo Post';
       //$this->_view->prueba = $this->getTexto('comment');
       if($this->_post->insertarPost(6,$this->getTexto('comment')))
       {
        return TRUE;
       }
       else
       {
        return FALSE;
       }
       
    }
}

?>