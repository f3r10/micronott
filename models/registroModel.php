<?php 

class registroModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verificarUsuario($nickname)
	{

		$nick = $this->_db->query("select iduser from user where nickname='$nickname'");
		$nick->fetch();
		if(count($nick)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function verificarMail($email)
	{
		$email = $this->_db->query(
			"select iduser from user where email='$email'"

			);
		$email->fetch();
		if(count($email)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function registrarUsuario($nombre, $apellido, $nickname, $email, $password)
	{
		$registroUsuario = $this->_db->prepare("INSERT INTO user (name,surename,nickname,email) values (:nombre,:apellido,:nickname,:email)" )->execute(
			array(
			":nombre" => $nombre,
			":apellido" => $apellido,
			":nickname" => $nickname,
			":email" => $email
			));
		if($registroUsuario)
		{
			
			
			if($registroUsuario = $this->_db->prepare("UPDATE  userscredentials set password=:password WHERE usrnickname=:nickname" )->execute(array(
			"password" =>Hash::getHash('sha1',$password,HASH_KEY),
			"nickname" => $nickname
			)))
			{
				$idUser = $this->_db->query("SELECT iduser from user where nickname='$nickname'");
				$idUser = $idUser->fetch();
				if($this->_db->prepare("INSERT INTO followersuser (idUser,idfollowers,nickname) values (:iduser,:idseguidor,:nickname)")->execute(array(
					"iduser" => $idUser['iduser'],
					"idseguidor" => $idUser['iduser'],
					"nickname" => $nickname
					)))
				{
					$time = date( 'Y-m-d H:i:s', time() );
					$this->_db->prepare("INSERT INTO profile (idUser,userProfileDesc,lastProfileChange) values (:iduser,:userProfileDesc,:lastProfileChange)")->execute(array(
					"iduser" => $idUser['iduser'],
					"userProfileDesc" =>"pon tu descripcion",
					"lastProfileChange" => $time
					));

					$this->_db->prepare("INSERT INTO photosuser(iduser,location,caption)values(:iduser,:location,:caption)")->execute(			
					array(
					":iduser" => $idUser['iduser'],
					":location" => "photos/unknown.png",
					":caption" => "foto del usuario",
					));
					return true;
				}
				else
				{
					return FALSE;
				}
				
			}
			else
			{
				return false;
			}



		}
		else
		{
			return false;
		}
	}
}

 ?>