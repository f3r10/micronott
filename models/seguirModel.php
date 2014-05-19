<?php 
class seguirModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function comprobarSeguimiento($idUser ,$idCompa)
	
	{
		$post = $this->_db->query("select * from followersuser where iduser='$idUser' and idfollowers='$idCompa'");
		if($post)
		{
			return $post->fetch();	
		}
		
		
	
	
	
	
	}

	public function registrarSeguir($idUser, $idFollowers,$nickname)
	{
		
		if($this->_db->prepare("INSERT INTO followersuser(iduser, idfollowers,nickname) VALUES (:iduser,:idfollowers,:nickname)")->execute(
			array(
				":iduser" => $idUser,
				":idfollowers" => $idFollowers,
				":nickname"=>$nickname
				)
			)
			)
		{
			return TRUE;
		}
		else
		{
			return 'no se registro';
		}
			
	}
} 
?>