<?php 
class postModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPost($idUsuario)
	{
		$post = $this->_db->query("select p.postContent as Contenido, 
			p.postingTime as Tiempo, p.postStatus as Estado, u.nickname 
			as nickname from post p, user u where p.idUser=u.iduser and p.idUser='$idUsuario'");
		
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

	public function getIdPost($time)
	{
		$get = $this->_db->query("SELECT idpost from post where postingTime = '$time' ");
		if($get)
		{
			return $get->fetch();
		}
		else
		{
			return false;
		}
	}

	public function setRetweet($idPost,$idOwner,$idUser)
	{
		$registroRetweet = $this->_db->query("SELECT * from retweet where idUser='$idUser' and idpost='$idPost' and idOwner='$idOwner'");
		if($registroRetweet->rowCount()!=0)
		{
			$mensaje = "twett ya registrado";
		}
		else
		{
			if($this->_db->prepare("INSERT INTO retweet(idpost, idOwner ,idUser) VALUES (:idpost,:idOwner , :idUser)")->execute(
			array(
				':idpost' => $idPost,
				':idOwner' => $idOwner,
				':idUser' => $idUser
				)
			))
		{
			$this->_db->query("UPDATE post set postStatus=1 where idpost = '$idPost' ");
			$mensaje = "registro exitoso";
		}
		else
		{
			$mensaje = "fallo en el registro";
		}
		}

		return $mensaje;
		

	}

	public function getIdUserOwner($nickname)
	{
		$get = $this->_db->query("SELECT iduser from user where nickname = '$nickname' ");
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