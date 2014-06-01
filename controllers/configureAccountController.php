<?php


class configureAccountController extends Controller
{
    private $_perfil;
    private $_fotos;
	public function __construct()
	{
		parent::__construct();
        $this->_perfil = $this->loadModel('configurationAccount');
        $this->_fotos = $this->loadModel('insertarFotos');

	}
    public function index()
    {   
        
        $this->_view->renderizar('configureAccount','post');  
    }
        
    public function addPhotos()
    {
        if($this->getInt('enviar')==1)
        {
          if((Session::get('autenticado'))){


        if (isset($_FILES['photo']['tmp_name'])) {
             //echo $_FILES['photo']['tmp_name'];
        $file=$_FILES['photo']['tmp_name'];
        $image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $image_name= addslashes($_FILES['photo']['name']);
            
            move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/" . $_FILES["photo"]["name"]);
            
            $location="photos/" . $_FILES["photo"]["name"];            
            $this->_fotos->insertPhotos(Session::get('idUser'),$location,$this->getTexto('caption'));
            $this->redireccionar();
        
        }
        else{
                //echo $_FILES['photo']['tmp_name'];
                echo "fallo";
        }

        $this->_perfil->InsertarPerfilConfiguration(Session::get('idUser'),$this->getPostParam('commet'));
        

        }  
        }
        
    }
}

    



?>