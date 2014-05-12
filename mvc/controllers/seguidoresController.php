<?php


class seguidoresController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
    public function index()
    {
    	$this->_view->titulo = 'Seguidores';
        $this->_view->renderizar('seguidores','post');
    }
}

?>