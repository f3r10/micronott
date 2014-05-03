<?php 
  require 'app/controller/mvc.controller.php';


$mvc = new mvc_controller();

  if(isset($_GET['action']))
  {
  	if($_GET['action'] == 'irLogin')
  	{
  		$mvc->irLogin();
  	}
    
  	else
  	{
  		 $mvc->principal();
  	}
    
  }
  else if( isset($_POST['username']) && isset($_POST['password']) )
    {
      $mvc->analizarLogin($_POST['username'], $_POST['password']);
    }
  else
  {
    $mvc->principal();
  }


 ?>