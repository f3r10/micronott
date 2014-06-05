<?php


class configureAccountController extends Controller
{
    private $_perfil;
    private $_fotos;
    private $_profile;
    private $_conteocomentarios;
    private $_conteoseguidos;
    private $_following;
	public function __construct()
	{
		parent::__construct();
        $this->_perfil = $this->loadModel('configurationAccount');
        $this->_fotos = $this->loadModel('insertarFotos');
        $this->_profile = $this->loadModel('profile');
        $this->_conteocomentarios=$this->loadModel('countParams');
        $this->_conteoseguidos=$this->loadModel('countParams');
        $this->_following = $this->loadModel('postSeguidos');

	}
    public function index()
    {  

        $this->_view->conteoseguidores = count($this->_following->userOfFollowing(Session::get('idUser')));
        $this->_view->conteocomentarios=$this->_conteocomentarios->contarComentarios(Session::get('idUser'));
        //print_r($this->_conteocomentarios->contarComentarios(Session::get('idUser')));
        $this->_view->conteoseguidos=count($this->_following->userOfFollower(Session::get('idUser')));
     if(!empty(Session::get('idUser')))
        {
        $this->_view->foto = $this->_fotos->getPhoto(Session::get('idUser'));
        $this->_view->renderizar('configureAccount','post'); 
        }
        else
        {
            $this->redireccionar();

        } 
    }
        
    public function addPhotos()
    {
        if($this->getInt('enviar')==1)
        {
          if((Session::get('autenticado'))){


        if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name']) && !empty($this->getPostParam('commet')) && !empty($this->getPostParam('caption'))) {
             //echo $_FILES['photo']['tmp_name'];
             echo "caso 1";
        $this->_fotos->deletePhoto(Session::get('idUser'));
        $this->_profile->deleteDescription(Session::get('idUser'));
        $file=$_FILES['photo']['tmp_name'];
        $image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $image_name= addslashes($_FILES['photo']['name']);
            
            move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/" . $_FILES["photo"]["name"]);
            
            $location="photos/" . $_FILES["photo"]["name"];            
            $this->_fotos->insertPhotos(Session::get('idUser'),$location,$this->getTexto('caption'));
            $this->_profile->insertProfile(Session::get('idUser'),$this->getPostParam('commet'));
            $this->redireccionar();
        
        }
        else if (isset($_FILES['photo']['tmp_name']) && empty($_FILES['photo']['tmp_name']) && !empty($this->getPostParam('commet')) && empty($this->getPostParam('caption')))
        {  
             echo "caso2";
              $this->_profile->deleteDescription(Session::get('idUser'));
             $this->_profile->insertProfile(Session::get('idUser'),$this->getPostParam('commet'));
             $this->redireccionar();

        }
        else if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name']) && !empty($this->getPostParam('commet')) && empty($this->getPostParam('caption')))
        {
            echo "caso3";
             $this->_fotos->deletePhoto(Session::get('idUser'));
             $this->_profile->deleteDescription(Session::get('idUser'));
             $file=$_FILES['photo']['tmp_name'];
             $image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
             $image_name= addslashes($_FILES['photo']['name']);
            
             move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/" . $_FILES["photo"]["name"]);
            
            $location="photos/" . $_FILES["photo"]["name"];            
            $this->_fotos->insertPhotos(Session::get('idUser'),$location, $_FILES["photo"]["name"]);
            $this->_profile->insertProfile(Session::get('idUser'),$this->getPostParam('commet'));
            $this->redireccionar();
                
        }
        else if (isset($_FILES['photo']['tmp_name']) && empty($_FILES['photo']['tmp_name']) && !empty($this->getPostParam('commet')) && !empty($this->getPostParam('caption')))
        {
             echo "caso2";
             $this->_profile->deleteDescription(Session::get('idUser'));
             $this->_profile->insertProfile(Session::get('idUser'),$this->getPostParam('commet'));
             $this->redireccionar();
        } 
        else
        {
             $this->redireccionar();
        }      

        }
        else
        {
            $this->redireccionar();
        } 
        }
        
    }
}

    



?>