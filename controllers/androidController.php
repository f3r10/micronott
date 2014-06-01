<?php


class androidController extends Controller
{
      private $_loginAndroid;
      private $_registro;
      private $_post;
      private $_postSeguidos;
      private $_fotos;
      private $_cargarUsuarios;
      private $_following;
      private $_btnParaSeguirUser;

  public function __construct()
  {
    parent::__construct();
    $this->_loginAndroid = $this->loadModel('loginAndroid');
    $this->_registro = $this->loadModel('registro');
    $this->_post = $this->loadModel('post');
    $this->_postSeguidos = $this->loadModel('postSeguidos');
    $this->_fotos = $this->loadModel('insertarFotos');
    $this->_cargarUsuarios = $this->loadModel('cargarUsuarios');
    $this->_following = $this->loadModel('postSeguidos');
    $this->_btnParaSeguirUser = $this->loadModel('seguir');
  }
    public function index()
    {
      if($this->getPostParam('username'))
        {
          Session::destroy();
            //echo  $this->getPostParam('a');
           // echo $this->getPostParam('a');
           $row = $this->_loginAndroid->getUsuario($this->getPostParam('username'),$this->getPostParam('password'));

           if($row)
         {
          Session::set('idUser',$row['iduser']);
          $response["success"] = 1;
          $response["message"] = "Login correct";
          $response["idUser"] = Session::get('idUser');
          echo json_encode($response);
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

    public function registro()
    {
      $usuarioExiste = TRUE;
      $mailExiste =TRUE;
      //$post = $this->loadModel('post');
      //$this->_view->post=$post->getPost();
      if($this->getPostParam('name') && $this->getPostParam('lastname') && $this->getPostParam('nickname') && $this->getPostParam('email')
              && $this->getPostParam('password') && $this->getPostParam('passwordConfirm'))
            { 
                $this->_view->datos = $_POST;
                if(!$this->getPostParam('name'))
                {
                    $response["success"] = 0;
                    $response["message"] = "Debe ingresar su nombre";
                    echo json_encode($response);
                }
                 if(!$this->getPostParam('lastname'))
                {
                    $response["success"] = 0;
                    $response["message"] = "Debe ingresar su apellido";
                    echo json_encode($response);
                }
                if (!$this->getAlphaNum('nickname'))
                {
                    $response["success"] = 0;
                    $response["message"] = "Debe ingresar el nombre de usuario";
                    echo json_encode($response);
                }
                if ($this->_registro->verificarUsuario($this->getPostParam('nickname')))
                {
                   $response["success"] = 0;
                   $response["message"] = "El usuario ya existe";
                   $usuarioExiste=FALSE;
                   echo json_encode($response);
                }
                if ($this->_registro->verificarMail($this->getPostParam('email')))
                {
                   $response["success"] = 0;
                   $response["message"] = "El email ya existe";
                   $mailExiste=FALSE;
                   echo json_encode($response);
                }
                else
                {
                  if ($usuarioExiste || $mailExiste)
                  {
                     if($this->_registro->registrarUsuario($this->getPostParam('name'),$this->getPostParam('lastname'),$this->getPostParam('nickname'),$this->getPostParam('email'),$this->getPostParam('password')))
                     {
                        $response["success"] = 1;
                        $response["message"] = "Resgister correct";
                        echo json_encode($response);
                     }

                  }
                  else
                  {
                    $response["success"] = 0;
                    $response["message"] = "aaa";
                    echo json_encode($response);
                  }
                     
                    
                }
                

            }
    }

    public function posts()
    {
        $response["success"] = 1;
        $response["posts"] = $this->_postSeguidos->cargarPostSeguidos($this->getPostParam('idUser'));
        echo json_encode($response);
       
    }

    public function postUltimos()
    {
       $response["success"] = 1;
        $response["posts"] = $this->_postSeguidos->cargarPostSeguidosUltimos($this->getPostParam('idUser'),$this->getPostParam('time'));
        echo json_encode($response);
    }

    public function nuevoPost()
    {
       $this->_view->titulo = 'Nuevo Post';
        $time = date( 'Y-m-d H:i:s', time() );
       //$this->_view->prueba = $this->getTexto('comment');
      if($this->_post->insertarPost($this->getPostParam('idUser'),$this->getPostParam('content'),$time))
       {
        $response["success"] = 1;
        $response["message"] = "Si se posteo!";
        echo json_encode($response);
        return TRUE;
       }
       else
       {
        $response["success"] = 0;
        $response["message"] = "No es pudo postear";
        echo json_encode($response);
        return FALSE;
       }
       
    }

    public function addPhotosAndroid()
    {

    


             $file_path = "photos/";
         
        $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
            echo "success";
            $this->_fotos->insertPhotos($_POST['param1'],$file_path,"foto del usuario");
        } else{
            echo "fail";
        }
     
   
    }

    public function allUser()
    {
      /*if($this->_cargarUsuarios->cargarUsuarios($this->getPostParam('idUser')))
      {
        $response["success"] = 1;
        $response["users"] = $this->_cargarUsuarios->cargarUsuarios($this->getPostParam('idUser'));
        echo json_encode($response);
      }
      else
      {
        $response["success"] = 0;
        $response["message"] = "No hay usuarios";
        echo json_encode($response);
      }*/
      if($this->_following->noFollower($this->getPostParam('idUser')))
      {
        $response["success"] = 1;
        $response["allUser"] = $this->_following->noFollower($this->getPostParam('idUser'));
        $response["count"] = $this->_following->countFollower($this->getPostParam('idUser'));
        echo json_encode($response);
      }
      else
      {
        $response["success"] = 0;
        $response["message"] = "No sigues a nadie";
        echo json_encode($response);
      }

    }

    public function userFollower()
    {
       if($this->_following->userOfFollower($this->getPostParam('idUser')))
      {
        $response["success"] = 1;
        $response["usersFollower"] = $this->_following->userOfFollower($this->getPostParam('idUser'));
        echo json_encode($response);
      }
      else
      {
        $response["success"] = 0;
        $response["message"] = "No te sigue nadie";
        echo json_encode($response);
      }
    }

     public function userFollowing()
    {
      if($this->_following->userOfFollowing($this->getPostParam('idUser')))
      {
        $response["success"] = 1;
        $response["usersFollowing"] = $this->_following->userOfFollowing($this->getPostParam('idUser'));
        echo json_encode($response);
      }
      else
      {
        $response["success"] = 0;
        $response["message"] = "No sigues a nadie";
        echo json_encode($response);
      }
    }

    public function countFollower()
    {
      if($this->_following->countFollower($this->getPostParam('idUser')))
      {
        $response["success"] = 1;
        $response["usersFollower"] = $this->_following->countFollower($this->getPostParam('idUser'));
        echo json_encode($response);
      }
      else
      {
        $response["success"] = 0;
        $response["message"] = "No te sigue nadie";
        echo json_encode($response);
      }
    }

    public function profileUsuario()
    {
     
       if($this->_cargarUsuarios->profileUser($this->getPostParam('idUser')))
      {
        $response["success"] = 1;
        $response["userProfile"] = $this->_cargarUsuarios->profileUser($this->getPostParam('idUser'));
        $response["photo"] = $this->_cargarUsuarios->photoUser($this->getPostParam('idUser'));
        echo json_encode($response);
      }
      else
      {
        $response["success"] = 0;
        $response["message"] = "error en el perfil";
        echo json_encode($response);
      }
    }
    
    

     public function seguir()
  {

    
    $resultadoSeguir = $this->_btnParaSeguirUser->registrarSeguir($this->getPostParam('idUser'),$this->getPostParam('idUserAmigo'),$this->getPostParam('nicknameAmigo'));
    if($resultadoSeguir)
    {
       $response["success"] = 1;
        $response["message"] = "siguiendo";
        echo json_encode($response);
    }
    else
    {
       $response["success"] = 1;
        $response["message"] = "error al seguir ";
        echo json_encode($response);
    }
 

  }


    
}

?>