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
</head>
<body>
	<header>
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
	
			</div>
		</div>
		<div class="usuario">
			<a class="flechita" href="<?php  echo BASE_URL  ?>registro"></a>
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
	
	
	
	

