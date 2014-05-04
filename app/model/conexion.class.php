<?php 
class Conexion{
	private static $instancia;
	private $dbh;

	private function __construct()
	{
		try
		{
			$this->dbh= new PDO('mysql:host=localhost;dbname=micronott','root','root');
			$this->dbh->exec("SET CHARACTER SET uft8");
		}catch(PDOException $e){
			print "Error:" . $e->getMessage();
			die();
		}
	}

	public function prepare($sql)
	{
		return $this->dbh->prepare($sql);
	}

	public static function singleton_conexion()
	{
		if(!isset(self::$instancia))
		{
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}

		return self::$instancia;
	}


	public function __clone()
	{
		trigger_error("La clonacion de este objeto no esta permitida", E_USER_ERROR);

	}
}
?>