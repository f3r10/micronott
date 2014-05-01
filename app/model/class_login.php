<?php 
require_once 'conexion.class.php';
session_start();
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
			$sql = "SELECT * from usrlogin WHERE username =? AND password =?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$username);
			$query->bindParam(2,$password);
			$query->execute();
			$this->dbh = null;

			//si existe el usuario
            if($query->rowCount() == 1)
            {
                 
                 $fila  = $query->fetch();
                 $_SESSION['username'] = $fila['username'];                 
                 return TRUE;
    
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