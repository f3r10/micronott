<?php 
  require 'app/controller/mvc.controller.php';


$mvc = new mvc_controller();
$sesion=FALSE;
if(isset($_SESSION["autenticado"]))
{
  $sesion=TRUE;
}
else
{
  $sesion=FALSE;
}


  if(isset($_GET['action']))
  {
  	if($_GET['action'] == 'irLogin')
  	{
  		$mvc->irLogin();
  	}
    else if ($_GET['action'] == 'irRegister')
    {
      $mvc->irRegister();
    }
    
  	else
  	{
  		 $mvc->principal();
  	}
    
  }
  else if( isset($_POST['username']) && isset($_POST['password'])  )
    {
      $mvc->analizarLogin($_POST['username'], $_POST['password']);
    }
  else if(isset($_POST['username']) && isset($_POST['password']) )
  {
    $mvc->analizarLoginAjax($_POST['username'], $_POST['password']);
  }

  else if(isset($_POST['email']) && !isset($_POST['lName']) )
  {
    $mvc->analizarRegisterAjax($_POST['email']);
  }
  else if(isset($_POST['nickname']) && !isset($_POST['lName'] ))
  {
    $mvc->analizarRegisterAjax_nickName($_POST['nickname']);
  }
  #else if (strstr($_SERVER['REQUEST_URI'], '/micronott/index.php') || strstr($_SERVER['REQUEST_URI'], '/micronott/') && $sesion)
  #{
   # $mvc->contenido();
  #}
  else if (isset($_POST['fName']) && isset($_POST['lName'])&& isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])  )
  {
    $mvc->registrarUsuario(($_POST['fName']),($_POST['lName']),($_POST['nickname']) ,($_POST['email']) ,($_POST['password']) ,($_POST['password2']) );
    //echo "que fue ";
  }

  

  else
  {
    $mvc->principal();
  }


 ?>