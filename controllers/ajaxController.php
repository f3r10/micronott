<?php
class ajaxController extends Controller
{
	private $_retweet;
	public function __construct()
	{
		parent::__construct();
        $this->_retweet = $this->loadModel('post');
        

		
	}
    public function index()
    {
    	if(!empty(Session::get('idUser')))
    	{
    		if($this->getPostParam('value')==1)
            {
                $idPost = $this->_retweet->getIdPost($this->getPostParam('post'));
                $idOwner = $this->_retweet->getIdUserOwner($this->getPostParam('userCompa'));
                $setRetweet = $this->_retweet->setRetweet($idPost['idpost'],$idOwner['iduser'],Session::get('idUser'));
                print_r( $setRetweet);
            }
    	}
    	else
    	{
    		
    	}
    	
    }
}

?>