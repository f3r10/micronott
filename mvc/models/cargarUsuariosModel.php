<?php 
class cargarUsuariosModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cargarUsuarios()
	{
		//$datos = $this->_db->query("SELECT * FROM users");
		$post = $this->_db->query("SELECT * FROM user");
		
		if($post)
		{
		return $post->fetchall();
		}
	}
} 
?>