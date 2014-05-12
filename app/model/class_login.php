<?php 
require_once 'conexion.class.php';
class Login
{
	private static $instancia;
	private $dbh;

	private function __construct()
	{
		$this->dbh = Conexion::singleton_conexion();
	}

	public static function singleton_login()
	{
		if(!isset(self::$instancia))
		{
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}

		return self::$instancia;
	}

	public function login_users($username,$password)
	{
		try
		{
			//$sql = "SELECT * from user usr, userscredentials c  WHERE usr.iduser=c.iduser and  usr.nickname =? AND c.password =?";
			$sql = "SELECT idUsersCredentials, usrnickname, password FROM userscredentials WHERE usrnickname=? and password=? LIMIT 1";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$username);
			$query->bindParam(2,$password);
			$query->execute();
			$rows=$query->fetch(PDO::FETCH_ASSOC);
			$user_id= $rows['idUsersCredentials'];
			$this->dbh = null;

			//si existe el usuario
            if($query->rowCount()== 1)
            {
            	
                $user_id= $rows['idUsersCredentials'];
                $user_browser = $_SERVER['HTTP_USER_AGENT']; //Obtén el agente de usuario del usuario
                $user_id = preg_replace("/[^0-9]+/", "", $user_id); //protección XSS ya que podemos imprimir este valor
                $_SESSION['user_id'] = $user_id;
                $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); //protección XSS ya que podemos imprimir este valor
                $_SESSION['username'] = $username;          
                 return TRUE;
    
            }
            else
            {
            	return FALSE;
            }
		}
		catch(PDOException $e){
            
            print "Error!: " . $e->getMessage();
            
        }  
	}

	 // Evita que el objeto se pueda clonar
    public function __clone()
    {
 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
 
    }
}
 ?>