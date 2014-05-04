<div class="logo">
			<img src="app/views/default/imagenes/logo2.png" alt="Micronott" />
		</div>
		<div class="titular">
			<h1 class="titulo">
				MicroNott: Comunidad profesional 
			</h1>
			<div>
				<a class="filtro" href="#">
					IEEE
				</a>
				<a class="publicar" href="#openModal" id="idPublicar">Publicar</a>
				<div id="openModal" class="modalDialog">
					<div>
						<a href="#close" title="Close" class="close">X</a>
						<form class="formularioEnvio" method="post" action="#">
							<fieldset  id="smart-content">
							<p>
							<input type="text" id="comment"class="comment" placehoder="Here your text">
							</p>
							<input type="button" name="enviar" value="Enviar" onclick="addContent()" >
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="usuario">
			<figure class="avatar">
				<img src="app/views/default/imagenes/unknown.png" alt="freddier" />
			</figure>
			<a class="flechita" href="#"></a>
		</div>