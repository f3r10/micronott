<?php 
class profileModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertProfile($idUser , $comment)
	{
		
		$setProfile=$this->_db->prepare("INSERT INTO 
			profile(iduser,userProfileDesc)values(:iduser,:comment)")->execute(			
			array(
			":iduser" => $idUser,
			":comment" => $comment,
				));
		if($setProfile)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function deleteDescription($idUser)
	{
		$delete = $this->_db->query("DELETE from profile WHERE idUser='$idUser'");
		if($delete)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getDescripcion($idUser)
	{
		$get = $this->_db->query("SELECT userProfileDesc from profile where iduser = '$idUser' ");
		if($get)
		{
			return $get->fetch();
		}
		else
		{
			return false;
		}
	}
} 
?>