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
			and p.iduser in (SELECT idfollowers FROM followersuser WHERE iduser='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}

	public function userOfFollowing($iduser)
	{
		$post = $this->_db->
		query("SELECT u.iduser as idUser, u.nickname as nickname from  user u   
			where u.iduser in (SELECT idfollowers FROM followersuser WHERE iduser='$iduser' and not idfollowers='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}
	public function userOfFollower($iduser)
	{
		$post = $this->_db->
		query("SELECT u.iduser as idUser, u.nickname as nickname from  user u   
			where u.iduser in (SELECT iduser FROM followersuser WHERE idfollowers='$iduser' and not iduser='$iduser')");
		
		if($post)
		{
		return $post->fetchall();
		}
	}
} 
?>