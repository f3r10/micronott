<?php 
class loginAndroidModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUsuario($usuario , $password)
	{
		$datos = $this->_db->query(
			"SELECT * FROM userscredentials".
			" WHERE usrnickname='$usuario'" .
			"and password='$password' "
			);

		return $datos->fetch();
	}
} 
?>