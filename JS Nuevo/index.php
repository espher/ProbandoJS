<!--
JS dentro de HTML5
Actualmente existen tres formas de referenciar elementos HTML desde JAvaScript

1 - getElementsByTagName 	este metodo referencia un elemento por su nombre o palabra clave


2 - getElementById    		Este metodo referencia por el valor del atributo "id"


3 - getElementsByClassName	Este metodo es una nueva incorporacion de HTML5 que nos permitre referencias un elemento por su atributo "class"


Veamos como utilizar estos...


<!doctype html>
<html>
<head>
	<script type="text/javascript">
		function mostrarAlerta(){
			alert("clic");
		}
		function click(){
			document.getElementsByTagName('p')[0].onclick=mostrarAlerta;
		}
		window.onload=click;
	</script>
	<title>JS Prueba</title>
</head>
<body>

	<div id="primero">
		<p>Click</p>
		<p>No Click</p>
	</div>

</body>
</html>
-->








<!--
Nuevos Selectores en HTML5

Los metodos de seleccion anterior mente vistos (getElementsByTagName, getElementById, getElementsByClassName) no siempre son suficientes para poder trabajar como necesitamos ahora con las novedades de HTML5 para elevar a JS al siguiente nivel podemos seleccionar HTML aplicando las clases de CSS por medio de los nuevos metodos que son querySelector() y querySelectorALL()


querySelector();
Este metodo retorna el primer elemento que concuerda con el grupo de selectores espesificados entre parentecis los selectores son declarados usando comillas y la misma sintaxis  CSS, ej.



<!doctype html>
<html>
<head>
	<script type="text/javascript">
	function click(){
		document.querySelector("#primero p:first-child").onclick=mostrarAlerta;
	}
	function mostrarAlerta(){
		alert("hizo click");
	}
	window.onload=click;
</script> 
	<title>JS Prueba</title>
</head>
<body>

	<div id="primero">
		<p>Click</p>
		<p>No Click</p>
	</div>

</body>
</html>
-->



<!--
querySelectorAll();
Este metodo en vez de retornar solo un elemento  retorna TODOS los elementos que concuerdan con la seleccion declarada entre parentesis el valor retornado sera en un array cada elemento con el orden que ha encontrado dentro del DOM


<!doctype html>
<html>
<head>
	<script type="text/javascript">

	/* 
		con este metodo estamos seleccionado uno que se encuentra ubicado en el arreglo con la posicin 0 "cero"
	function click(){
		var lista = document.querySelectorAll("#primero p");
		lista[0].onclick=mostrarAlerta;
	}
	*/

	/*
		Con este form todos los elementos "p" dentro del "div" primero mostrara un alerta al momento que le hacen un click
	*/
	function click(){
		var lista = document.querySelectorAll("#primero p");
		for (var i = lista.length - 1; i >= 0; i--) {
			lista[i].onclick=mostrarAlerta;
		};
	}

	function mostrarAlerta(){
		alert("hizo click");
	}

	window.onload=click;
</script> 
	<title>JS Prueba</title>
</head>
<body>

	<div id="primero">
		<p>Click</p>
		<p>No Click</p>
	</div>

</body>
</html>
-->


<!--
Conjugando Metodos

Ahora veremos una mezcla de como usar los selectores "tradicionales" con los query selectors mezclando ambos para poder llegar a donde necesitamos... en este ejemplo utilizaremos la seleccion por id para poder llegar  a un "P" espesifico....

<!doctype html>
<html>
<head>
	<script type="text/javascript">
	function click(){
		var lista=document.getElementById("primero").querySelectorAll("p");
		lista[0].onclick=mostrarAlerta;
	}

	function mostrarAlerta(){
		alert("hizo click");
	}

	window.onload=click;
</script> 
	<title>JS Prueba</title>
</head>
<body>

	<div id="primero">
		<p>Click</p>
		<p>No Click</p>
	</div>

</body>
</html>
-->


Manejadores de eventos
El codigo JavaScript siempre es ejecutado despues de que realizamos un evento dentro del DOM por ejemplo La carga de una pagina, click sobre un boton, insercion de texto en un input etc. Existen tres formas de diferentes formas de registrar un evento para un elemento HTML.

1 - Agregar un nuevo atributo al elemento
2 - Registrar un manejador de evento como una propiedad de elemento
3 - addEventListiner()/attachEvent el nuevo metodo de HTML5

Manejador de eventos addEventLisitner()/attachEvent()
NOTA: addEventLisitner() y attachEvent() ambos metodos realizan exactamente lo mismo solo que como siempre Microsoft vino a fregarnos la vida... y utiliza sus propios manejadores del DOM osea para IE usamos attachEvent() y para los que si son navegadores usamos addEventListiner()

este manejador de eventos es el nuevo estandard dentro de HTML5 cuenta con tres argumentos: el nombre del evento, la funcion a ser ejecutada, valor boleano que indica como un evento sera disparado  cuando se llame  o se ejecute el elemento.

<!doctype html>
<html>
<head>
	<script type="text/javascript">
	function click(){
		var lista=document.getElementsByTagName("p")[0];
		lista.addEventListener("click",mostrarAlerta,false);
	}

	function mostrarAlerta(){
		alert("hizo click");
	}

	window.addEventListener("load",click,false);
</script> 
	<title>JS Prueba</title>
</head>
<body>

	<div id="primero">
		<p>Click</p>
		<p>No Click</p>
	</div>

</body>
</html>