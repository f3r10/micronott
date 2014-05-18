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
} 
?>