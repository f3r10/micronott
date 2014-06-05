<?php


class postController extends Controller
{
    private $_post;
    private $_postSeguidos;
    private $_insertarFotos;
	private $_conteocomentarios;
    private $_conteoseguidos;
    private $_following;
	public function __construct()
	{
		parent::__construct();
        $this->_post = $this->loadModel('post');
        $this->_postSeguidos = $this->loadModel('postSeguidos');
        $this->_insertarFotos = $this->loadModel('insertarFotos');
		$this->_conteocomentarios=$this->loadModel('countParams');
        $this->_conteoseguidos=$this->loadModel('countParams');
        $this->_following = $this->loadModel('postSeguidos');
	}
    public function index()
    {
      $numberTweet = 0;
      if(!empty(Session::get('idUser')))
      {
        $post=$this->_postSeguidos->cargarPostSeguidos(Session::get('idUser'));
        $retweet=$this->_postSeguidos->getRetweet(Session::get('idUser'));
        $this->_view->user=Session::get('usuario');
        $this->_view->titulo = 'Contenido';
        $this->_view->foto = $this->_insertarFotos->getPhoto(Session::get('idUser'));
		$this->_view->conteoretweet=count($retweet);
        $this->_view->conteocomentarios=$this->_conteocomentarios->contarComentarios(Session::get('idUser'));
        //print_r($this->_conteocomentarios->contarComentarios(Session::get('idUser')));
        $this->_view->conteoseguidos=count($this->_following->userOfFollower(Session::get('idUser')));

        $this->_view->conteoseguidores = count($this->_following->userOfFollowing(Session::get('idUser')));

        //obtener los retnott de la app
        for($i=0; $i<count($post) ; $i++)
        {
          $ret= array();
          //array_push($post[$i],$array);
          for($j=0; $j<count($retweet);$j++)
          {
            if($post[$i]['post']==$retweet[$j]['idpost'])
            {
              array_push($ret,$retweet[$j]['nickname']);
              
              $numberTweet++;
            }

            else
            {
              continue;
            }

          }
          array_push($post[$i],$ret);
          

        }
        // fin de obtener retnott

        $this->_view->post = $post;

        $this->_view->renderizar('index', 'post');

        // insertar post
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