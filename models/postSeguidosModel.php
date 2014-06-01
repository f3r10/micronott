<?php 
class postSeguidosModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cargarPostSeguidos($iduser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$post = $this->_db->
		query("SELECT  p.postContent as Contenido, p.postingTime, u.nickname as nickname from post p, user u 
			where p.iduser=u.iduser   
			and p.iduser in (SELECT idfollowers FROM followersuser WHERE iduser='$iduser') order by idpost DESC");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function userOfFollowing($iduser)
	{
		$post = $this->_db->
		query("SELECT u.iduser as idUser, u.name as nombre, u.surename as apellido, u.nickname as nickname from  user u   
			where u.iduser in (SELECT idfollowers FROM followersuser WHERE iduser='$iduser' and not idfollowers='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}
	public function userOfFollower($iduser)
	{
		$post = $this->_db->
		query("SELECT u.iduser as idUser, u.name as nombre, u.surename as apellido, u.nickname as nickname from  user u   
			where u.iduser in (SELECT iduser FROM followersuser WHERE idfollowers='$iduser'  and not iduser='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function cargarPostSeguidosUltimos($iduser, $time)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$post = $this->_db->
		query("SELECT  p.postContent as Contenido, p.postingTime, u.nickname as nickname from post p, user u 
			where p.iduser=u.iduser
			and p.postingTime > '$time'  
			and p.iduser in (SELECT idfollowers FROM followersuser WHERE iduser='$iduser' ) order by idpost DESC");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function countFollower($iduser)
	{
		$post = $this->_db->
		query("SELECT count(*)
			from  user u 
			where u.iduser 
			not in 
			(SELECT idfollowers FROM followersuser WHERE iduser='$iduser' and not idfollowers='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function noFollower($iduser)
	{
		$post = $this->_db->
		query("SELECT DISTINCT u.iduser as idUser, u.name as nombre, 
			u.surename as apellido, u.nickname as nickname, p.userProfileDesc as descripcion
			from user u, profile p 
			where u.iduser = p.iduser
			and not p.iduser = '$iduser'
			and u.iduser 
			not in 
			(SELECT idfollowers FROM followersuser WHERE iduser='$iduser' and not idfollowers='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	
} 
?>