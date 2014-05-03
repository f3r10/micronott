<!DOCTYPE html>
<html lang="en">
  <head>
  
    <!--code fo meta tags-->  
    <meta charset="utf-8">
	
	<!--code fo page title-->
    <title>Beautiful login form using HTML5 and CSS3 - Mubbashir10</title>
	
	
	<!--code for stylesheets-->
	<link rel="stylesheet" type="text/css" href="app/views/default/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="app/views/default/css/style.css">
	
	<!--code for fonts-->
    <link href="http://fonts.googleapis.com/css?family=Questrial" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css" />
	
	<!--code for js-->
	<script src="app/views/default/js/jquery-2.1.0.min.js"></script>
	
    
     
  </head>
  
  <body>
    <!--code for main wrapper-->
    <nav><a href="#" class="focus">Log In</a> | <a href="register.html">Register</a></nav>
	<section id="wrapper">
	
        <!--code for form-->
		<section id="form">
				<br/>				
		        <h1>Log in to your account</h1>
				<form name="login-form" id="smart-login" method="post" action="index.php">
					<fieldset id="smart-login-fields">
						<input id="username" name="username"type="text" placeholder="Username" required>
						<br/>
						<input id="password" name="password" type="password" placeholder="Password" required>
					</fieldset>
					<span class="password-reset"><a href="#">Forgot Your Password?</a></span><br/><br/><br/>
					<span class="cookie"><input type="checkbox" value="true">keep me login</span>
					<fieldset id="smart-login-actions">
						<input type="reset" id="reset" value="Reset">
						<input type="submit" id="login" value="Log in" >
					</fieldset>
					<br/>
	  			 </form>
    	</section>


	
	 
	
	</section>
	<div class="footer"></div>
	<div id="respuesta"></div>

	
	
  </body>
</html>