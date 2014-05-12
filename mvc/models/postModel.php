<?php 
class postModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPost($idUsuario)
	{
		$post = $this->_db->query("select * from post where idUser='$idUsuario' ");
		return $post->fetchall();
	}
	public function insertarPost($titulo, $cuerpo)
	{
		/*$sql= "INSERT INTO `post`(`postContent`, `idUser`) VALUES (?,?) ";
		$query = $this->_db->prepare($sql);
		$query->bindParam(1,$cuerpo);
		$query->bindParam(2,6);
		$query->execute();*/

		if($this->_db->prepare("INSERT INTO post(postContent, idUser) VALUES (:contenido, :idUser)")->execute(
			array(
				':contenido' => $cuerpo,
				':idUser' => $titulo
				)
			))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}
}

 ?>