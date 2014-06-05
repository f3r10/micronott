<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" 
		content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php echo $this->titulo ?></title>
	<link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'] ?>normalize.css" />
	<link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'] ?>puls4.css" />
	<script src="<?php echo $_layoutParams['ruta_js'] ?>jquery-2.1.0.min.js"></script>
	<script src="<?php echo $_layoutParams['ruta_js'] ?>retweet.js"></script>
</head>
<body>
	<header>
		<?php if(isset($this->prueba)) echo $this->prueba; ?>
		<div class="logo">
			<img src="<?php echo $_layoutParams['ruta_img'] ?>logo2.png" alt="Micronott" />
		</div>
		<div class="titular">
			<h1 class="titulo">
				MicroNott: Comunidad profesional 
			</h1>
			<div>
				<a class="filtro" href="#">
					IEEE
				</a>
				<?php if(Session::accesoViewEstricto(array('usuario'))) : ?>

				<a class="publicar" href="#openModal"  id="idPublicar">Publicar</a>
				<?php endif;?>
					<div id="openModal" class="modalDialog">
					<div>
						<a href="#close" title="Close" class="close">X</a>
						<form class="formularioEnvio" method="post" action="<?php echo BASE_URL; ?>post">
							<fieldset  id="smart-content">
							<p>
							<input type="text" name="comment" id="comment"class="comment" placehoder="Here your text" required>
							</p>
							<input type="submit" name="enviar" value="Enviar" onclick="addContent()" >
							</fieldset>
						</form>
					</div>
				</div>	
		</div>
		</div>
		<div class="usuario">
			<figure class="avatar">
				
				<img src="<?php echo $this->foto['location'] ?>" alt="freddier" />
			</figure>
			<a class="flechita" href="index/cerrar"></a>
		</div>
	</header>
	<nav>
		<ul class="menu">
			<?php if(isset($_layoutParams['menuContenido'])): ?>
			<?php for($i=0; $i<count($_layoutParams['menuContenido']);$i++): ?>
			<li><a href="<?php echo $_layoutParams['menuContenido'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menuContenido'][$i]['titulo']; ?></a></li>
			<?php endfor; ?>
			<?php endif; ?>
		</ul>
		
	</nav>
	
	<aside id="container">
		<div class="perfil">
		<div class="logo2">
			<img src="<?php echo $this->foto['location'] ?>" alt="freddier" />

			
		</div>
		<div class="datosContenido">
		<a href="#" class="comentarios"><?php echo ($this->conteocomentarios[0]);?></a>
			<!--<?php// endif?>-->
			<!--<?php //endif?>-->
			

			<a href="#" class="siguiendo"><?php echo($this->conteoseguidores);?></a>

			<a href="#" class="seguidores"><?php echo($this->conteoseguidos);?></a>
			<!--<a href="#" class="comentarios">12</a>
			<a href="#" class="siguiendo">120</a>
			<a href="#" class="seguidores">120</a>-->
		</div>
		</div>
	</aside>
	
	

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
