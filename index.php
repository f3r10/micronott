<?php 
  require 'app/controller/mvc.controller.php';


$mvc = new mvc_controller();

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
 # else if( isset($_POST['username']) && isset($_POST['password']) )
  #  {
   #   $mvc->analizarLogin($_POST['username'], $_POST['password']);
    #}
  else if(isset($_POST['username']) && isset($_POST['password']) )
  {
    $mvc->analizarLoginAjax($_POST['username'], $_POST['password']);
  }

  else if(isset($_POST['email'])  )
  {
    $mvc->analizarRegisterAjax($_POST['email']);
  }

  else
  {
    $mvc->principal();
  }


 ?>