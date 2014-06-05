<!DOCTYPE html>
<html lang="en">
  <head>
  
    <!--code fo meta tags-->  
    <meta charset="utf-8">
	
	<!--code fo page title-->
    <title>Beautiful login form using HTML5 and CSS3 - Mubbashir10</title>
	
	
	<!--code for stylesheets-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams['ruta_css'] ?>normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams['ruta_css'] ?>style.css">
	
	<!--code for fonts-->
    <link href="http://fonts.googleapis.com/css?family=Questrial" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css" />
	
	<!--code for js-->
	<script src="<?php echo $_layoutParams['ruta_js'] ?>jquery-2.1.0.min.js"></script>
	<script src="<?php echo $_layoutParams['ruta_js'] ?>ajaxConnection.js"></script>
	
    
     
  </head>
  
  <body>
    <!--code for main wrapper-->
    <nav>

    	<!--<a href="#" class="focus">Log In</a> | <a href="register.html">Register</a>-->
    	<?php if(isset($_layoutParams['menuPrincipal'])): ?>
			<?php for($i=0; $i<count($_layoutParams['menuPrincipal']);$i++): ?>
			<li><a href="<?php echo $_layoutParams['menuPrincipal'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menuPrincipal'][$i]['titulo']; ?></a></li>
			<?php endfor; ?>
			<?php endif; ?>
    	
    </nav>
    <?php if(isset($this->_error)): ?>
    <div id='error'> <?php echo $this->_error; ?></div>
	<?php endif ?>
	<?php if(isset($this->_mensaje)): ?>
    <div id='mensaje'> <?php echo $this->_mensaje; ?></div>
	<?php endif ?>
	<section id="wrapper">
	
       
