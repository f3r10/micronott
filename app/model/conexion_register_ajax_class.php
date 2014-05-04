<?php 
require_once 'conexion.class.php';
class Register_Ajax
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

	public function register_mail($email)
	{
		try
		{
			$sql = "SELECT * from user WHERE email =?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$email);
			$query->execute();
			$this->dbh = null;

			//si existe el usuario
            if($query->rowCount() == 1)
            {
                 
                 $fila  = $query->fetch();
                 $_SESSION['email'] = $fila['email'];                 
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