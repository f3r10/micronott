<?php 
class insertarFotosModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertPhotos($iduser,$location,$caption)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		if($InsertarFotos=$this->_db->prepare("INSERT INTO photosuser(iduser,location,caption)values(:iduser,:location,:caption)")->execute(			
			array(
			":iduser" => $iduser,
			":location" => $location,
			":caption" => $caption,
				)))
		{
			return true;
		}
		else{
			return false;
		}
	
}
	public function deletePhoto($idUser)
	{
		$delete = $this->_db->query("DELETE from photosuser WHERE idUser='$idUser'");
		if($delete)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
} 
?>

