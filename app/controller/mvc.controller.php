<?php 

require 'app/model/login.php';


class mvc_controller
{
	function login()
	{
		$html = $this->load_page('app/views/default/login.html');
		$this->view_page($html);
	}
	
	function principal()
	{
		$pagina=$this->load_template('Pagina Principal MVC');				
		$html = $this->load_page('app/views/default/modules/m.principal.php');
		$pagina = $this->replace_content('/\#SECTION\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
	}

	function load_template($title='Sin Titulo'){
		$pagina = $this->load_page('app/views/default/page.php');
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$nav = $this->load_page('app/views/default/sections/s.nav.php');
		$footer = $this->load_page('app/views/default/sections/s.footer.php');
		$aside = $this->load_page('app/views/default/sections/s.aside.php');
		$pagina = $this->replace_content('/\#HEADER\#/ms' ,$header , $pagina);
		$pagina = $this->replace_content('/\#NAV\#/ms' ,$nav , $pagina);				
		$pagina = $this->replace_content('/\#ASIDE\#/ms' ,$aside , $pagina);
		$pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer , $pagina);
		return $pagina;
	}

	private function load_page($page)
	{
		return file_get_contents($page);
	}

	private function view_page($html)
	{
		echo $html;
	}

	private function replace_content($in='/\#SECTION\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}
}


 ?>