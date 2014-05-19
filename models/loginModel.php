<?php 
class loginModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUsuario($usuario , $password)
	{
		$passhash =  Hash::getHash('sha1',$password,HASH_KEY);
		$datos = $this->_db->query(
			"SELECT * FROM userscredentials".
			" WHERE usrnickname='$usuario'" .
			"and password='$passhash'"
			);

		return $datos->fetch();
	}
} 
?>