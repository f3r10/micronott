<?php 

class configurationAccountModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*public function seleccionarFoto($iduser){
		$foto = $this->_db->query(
			"select * from photosuser where iduser='$$iduser'"
			);
		if($foto->fetch())
		{
			return true;
		}
		else
		{
			return false;
		}


	}*/


	public function InsertarPerfilConfiguration($user,$descprofile)
	{
		/*$user = $this->_db->query("select iduser from user where nickname='$nickname'");*/

		$InsertarPerfil=$this->_db->prepare("INSERT INTO profile(iduser,userProfileDesc)values(:user,:descprofile)")->execute(			
			array(
			":user" => $user,
			":descprofile" => $descprofile,
				));			
	}
}

 ?>