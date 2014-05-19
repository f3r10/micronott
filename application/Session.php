<?php 

class Session
{
	public static function init ()
	{
		session_start();
	}
	public static function destroy($clave = false)
	{
		if($clave)
		{
			if(is_array($clave))
			{
				for ($i=0; $i<count($clave); $i++)
				{
					if(isset($_SESSION[$clave[$i]]))
					{
						unset($_SESSION[$clave[$i]]);
					}
				}
			}
			else
			{
				if(isset($_SESSION[$clave]))
					{
						unset($_SESSION[$clave]);
					}
			}
		}
		else
		{
			session_destroy();
		}

	}

	public static function set($clave,$valor)
	{
		if(!empty($clave))
		{
		$_SESSION[$clave] = $valor;
		}
	}

	public static function get ($clave)
	{
		if(isset($_SESSION[$clave]))
		{
			return $_SESSION[$clave];
		}
	}

	public static function acceso($level)
	{
		if(!Session::get('autenticado'))
		{
			header('location: ' . BASE_URL . 'error/access/5050');
			exit;
		}
		Session::tiempoDeVidaSession();
		 if (Session::getLevel($level) > Session::getLevel(Session::get('level')))
		{
			header('location: ' . BASE_URL . 'error/access/5050');
			exit;
		}
	}

	public static function accesoView($level)
	{
		if(!Session::get('autenticado'))
		{
			return FALSE;
		}

		else if (Session::getLevel($level) > Session::getLevel(Session::get('level')))
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public static function getLevel($level)
	{
		$role['admin'] = 3;
		$role['especial'] = 2;
		$role['usuario'] = 1;
		if(!array_key_exists($level, $role))
		{
			throw new Exception("error de acceso");
			
		}
		else
		{
			return $role[$level];
		}
	}

	public static function accesoEstricto(array $level, $noAdmin = false)
	{
		if(!Session::get('autenticado'))
		{
			header('location: ' . BASE_URL . 'error/access/5050');
			exit;
		}
		Session::tiempoDeVidaSession();
		if(!$noAdmin == false)
		{
			if(Session::get('level') == 'admin')
			{
				return;
			}
		}

		if(count($level))
		{
			if(in_array(Session::get('level'), $level))
			{
				return;
			}
			else
			{
				header('location: ' . BASE_URL . 'error/access/5050');
			}
		}
	}

	public static function accesoViewEstricto(array $level, $noAdmin = false)
	{
		if(!Session::get('autenticado'))
		{
			return false;
		}
		if(!$noAdmin == false)
		{
			if(Session::get('level') == 'admin')
			{
				return true;
			}
		}

		if(count($level))
		{
			if(in_array(Session::get('level'), $level))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	public static function tiempoDeVidaSession()
	{
		$TIEMPO_SESION_INDEFINIDO = 0;
		if(!Session::get('tiempo') || !defined('SESSION_TIME'))
		{
			throw new Exception(" No se ha definido el tiempo de session");
			
		}
		if(SESSION_TIME == $TIEMPO_SESION_INDEFINIDO)
		{
			return;
		}
		if(time() - Session::get('tiempo') > (SESSION_TIME * 60))
		{
			Session::destroy();
			header('location: ' . BASE_URL . 'error/access/8080');
		}
		else
		{
			Session::set('tiempo',time());
		}


	}
}
 ?>