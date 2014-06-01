<?php 
class cargarUsuariosModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cargarUsuarios($iduser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$post = $this->_db->query("SELECT * FROM user where not iduser='$iduser'");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function cargarUsuariosVisitante()
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$post = $this->_db->query("SELECT * FROM user ");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function profileUser($idUser)
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

	public function photoUsuario($idUser)
	{
		$post = $this->_db->query("SELECT location from photosuser where iduser='$iduser' ");
		
		if($post)
		{
		return $post->fetchall();
		}
	}
} 
?>