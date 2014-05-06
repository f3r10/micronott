<?php 
require_once 'conexion.class.php';
class RegisterCredentiales
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

	public function register_credentials($nickname,$password)
	{
		try
		{
			$sql = "UPDATE  userscredentials set password=? WHERE usrnickname=?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$password);
			$query->bindParam(2,$nickname);
			$checkInsert = $query->execute();
			$this->dbh = null;
			if($checkInsert)
			{
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