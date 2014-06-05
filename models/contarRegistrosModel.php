<?php 
class contarRegistrosModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function contarRegistros($iduser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$numberOfFollowing = $this->_db->
		query("SELECT COUNT(*) FROM followersuser where iduser = '$iduser'");
		
		if($numberOfFollowing)
		{
		return $numberOfFollowing->fetchall();
		}
	}

	public function contarComentarios($idUser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$comentarios = $this->_db->query("SELECT COUNT(IdUser)FROM post where idUser='$idUser'");
		
		if($comentarios)
		{
		return $comentarios->fetchall();
		}
	}
} 
?>