function addContent()
{
	var content= document.getElementById("comment").value;
	var template = '<article class="post">\
			<div class="descripcion">\
				<div class="detalles">\
					<h2 class="titulo">'+ content +'</h2>\
					<p class="autor">\
						por <a href="#">Diana Reyes</a>\
					</p>\
					<a class="tag" href="#">CSS3</a>\
					<p class="fecha">hace <strong>20</strong> min</p>\
				</div>\
			</div>\
			<div class="acciones">\
				<div class="votos">\
					<a class="up" href="#"></a>\
					<span class="total">156</span>\
					<a class="down" href="#"></a>\
				</div>\
				<div class="datos">\
					<a class="comentarios" href="#">10</a>\
					<a class="estrellita" href="#"></a>\
				</div>\
			</div>\
		</article>';
		console.log(template);
	//document.getElementById("posts").innerHTML=template;
	theParent = document.getElementById("posts");
	theKid = document.createElement("div");
	theKid.innerHTML=template;

	theParent.appendChild(theKid);
	theParent.insertBefore(theKid,theParent.firstChild);
	
}