<?php 
class postModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPost($idUsuario)
	{
		$post = $this->_db->query("select p.postContent as Contenido, p.postingTime as Tiempo, p.postStatus as Estado, u.nickname as nickname from post p, user u where p.idUser=u.iduser and p.idUser='$idUsuario'");
		
		return $post->fetchall();
	}
	public function insertarPost($idUser, $cuerpo, $time)
	{
		/*$sql= "INSERT INTO `post`(`postContent`, `idUser`) VALUES (?,?) ";
		$query = $this->_db->prepare($sql);
		$query->bindParam(1,$cuerpo);
		$query->bindParam(2,Session::get('idUser'));
		$query->execute();*/

		if($this->_db->prepare("INSERT INTO post(postContent, postingTime ,idUser) VALUES (:contenido,:time , :idUser)")->execute(
			array(
				':contenido' => $cuerpo,
				':idUser' => $idUser,
				':time' => $time
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