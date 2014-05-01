<?php
require_once 'app/model/class_login.php';
//accedemos al método singleton que es quién crea la instancia
//de nuestra clase y así podemos acceder sin necesidad de
//crear nuevas instancias, lo que ahorra consumo de recursos
$nuevoSingleton = Login::singleton_login();
 
if(isset($_POST['username']))
{
    $nick = $_POST['username'];
    $password = $_POST['password'];
    //accedemos al método usuarios y los mostramos
    $usuario = $nuevoSingleton->login_users($nick,$password);
    
    if($usuario == TRUE)
    {
        header("Location:home.php");
    }
}
?>