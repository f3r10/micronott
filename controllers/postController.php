<?php


class postController extends Controller
{
    private $_post;
    private $_postSeguidos;
    private $_insertarFotos;
	public function __construct()
	{
		parent::__construct();
        $this->_post = $this->loadModel('post');
        $this->_postSeguidos = $this->loadModel('postSeguidos');
        $this->_insertarFotos = $this->loadModel('insertarFotos');
	}
    public function index()
    {
      if(!empty(Session::get('idUser')))
      {
        $this->_view->post=$this->_postSeguidos->cargarPostSeguidos(Session::get('idUser'));
        $this->_view->titulo = 'Contenido';
        $this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
      
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
            $this->_view->prueba = "Debe ingresar contenido en el campo";
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
       $time = date( 'Y-m-d H:i:s', time() );
       //$this->_view->prueba = $this->getTexto('comment');
       if($this->_post->insertarPost(Session::get('idUser'),$this->getTexto('comment'),$time))
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