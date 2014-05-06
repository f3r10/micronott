<?php 
require_once 'conexion.class.php';
require_once 'class.conexion_registroCredenciales.php';
class RegisterUser
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

	public function register_user($fname,$lname,$nickname,$email,$password,$password2)
	{
		try
		{
			$sql = "INSERT into user (name,nickname,surename,email) values(?,?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$fname);
			$query->bindParam(2,$nickname);
			$query->bindParam(3,$lname);
			$query->bindParam(4,$email);
			$checkInsert = $query->execute();
			$this->dbh = null;

            if($checkInsert)
            {         
            	$nuevoSingleton = RegisterCredentiales::singleton_login();
            	$registro = $nuevoSingleton->register_credentials($nickname,$password);
            	echo $registro;
    
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