<?php 
class countParamsModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function contarComentarios($idUser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$comentarios = $this->_db->query("SELECT COUNT(IdUser)FROM post where idUser='$idUser'");
		
		if($comentarios)
		{
		return $comentarios->fetch();
		}
	}

	public function contarSeguidos($idUser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$seguidos = $this->_db->query("SELECT COUNT(idfollowersuser) FROM followersuser where iduser='$idUser'");
		echo "si esta entrando";
		if($seguidos)
		{
		return $seguidos->fetch();
		}
	}

	public function contarSeguidores($idUser)
	{
		$post = $this->_db->query("SELECT u.name as nombre, u.nickname as nickname, 
			u.email as email, p.userProfileDesc as descripcion
		 from user u, profile p
		 where u.idUser=p.idUser
		 and u.idUser ='$idUser'");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	

	
} 
?>