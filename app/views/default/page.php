<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" 
		content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>MicroNott: Comunidad profesional</title>
	<link rel="stylesheet" href="app/views/default/css/normalize.css" />
	<link rel="stylesheet" href="app/views/default/css/puls4.css" />
	<script src="app/views/default/js/jquery-2.1.0.min.js"></script>
</head>
<body>
	<header>
		#HEADER#
	</header>
	<nav>
		#NAV#
	</nav>
	<section class="posts">
	#SECTION#
	
		
	</section>
	<aside id="container">
		#ASIDE#
	</aside>
	
	<footer>
		#FOOTER#
	</footer>

	<script>
				$(function() {
					console.log("entra")
				var fixadent = $("#container"), pos = fixadent.offset();
				$(window).scroll(function() {
				if($(this).scrollTop() > pos.top)
				{ 
					console.log("detecta el cambio")
					$(fixadent).css('top','0');
					$(fixadent).css('right','0em');
					$(fixadent).css('position','fixed');
				}
				else
				{
					$(fixadent).css('top','10');
					$(fixadent).css('position','block');
				}
				
})
});
	</script>

	<script src="app/views/default/js/addCommentToContent.js"></script>
</body>
</html>