<?php 
class cargarUsuariosModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cargarUsuarios($iduser)
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$post = $this->_db->query("SELECT * FROM user where not iduser='$iduser'");
		
		if($post)
		{
		return $post->fetchall();
		}
	}
} 
?>