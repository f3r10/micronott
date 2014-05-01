<?php 
  require 'app/controller/mvc.controller.php';


$mvc = new mvc_controller();

  if(isset($_GET['action']))
  {
  	if($_GET['action'] == 'login')
  	{
  		$mvc->login();
  	}
  	else
  	{
  		 $mvc->principal();
  	}
    
  }
  else
  {
    $mvc->principal();
  }


 ?>