<!-- 
API Web Storage

La API Web Storage es básicamente una mejora de las Cookies. Esta API nos permite almacenar datos en el disco
duro del usuario y utilizarlos luego del mismo modo que lo haría una aplicación de escritorio

El proceso de almacenamiento provisto por esta API puede ser utilizado en dos situaciones particulares: cuando la información tiene que estar disponible solo durante la sesión en uso, y cuando tiene que ser preservada todo el tiempo que el usuario desee. Para comprenderlo de mejor forma esta API se dividio en 2


	1 - sessionStorage Este es un mecanismo de almacenamiento que conservará los datos disponible solo durante la duración de la sesión de una página. De hecho, a diferencia de sesiones reales, la información almacenada a través de este mecanismo es solo accesible desde una única ventana o pestaña y es preservada hasta que la ventana es cerrada. La especificación aún nombra “sesiones” debido a que la información es preservada incluso cuando la ventana es actualizada o una nueva página desde el mismo sitio web es cargada

	2 -	localStorage Este mecanismo trabaja de forma similar a un sistema de almacenamiento para aplicaciones de escritorio. Los datos son grabados de forma permanente y se encuentran siempre disponibles para la
	aplicación que los creó.


Ambos mecanismos trabajan a través de la misma interface, compartiendo los mismos métodos y propiedades. Y
ambos son dependientes del origen, lo que quiere decir que la información está disponible solo a través del sitio web o la aplicación que los creó. Cada sitio web tendrá designado su propio espacio de almacenamiento que durará hasta que la ventana es cerrada o será permanente, de acuerdo al mecanismo utilizado.

La API claramente diferencia datos temporarios de permanentes, facilitando la construcción de pequeñas
aplicaciones que necesitan preservar solo unas cadenas de texto como referencia temporaria (por ejemplo, carros de compra) o aplicaciones más grandes y complejas que necesitan almacenar documentos completos por todo el tiempo que sea necesario.

sessionStorage()

Esta parte de la API, sessionStorage, es como un reemplazo para las Cookies de sesión. Las Cookies, así como
sessionStorage, mantienen los datos disponibles durante un período específico de tiempo, pero mientras las
Cookies de sesión usan el navegador como referencia, sessionStorage usa solo una simple ventana o pestaña.

Esto significa que las Cookies creadas para una sesión estarán disponibles mientras el navegador continúe abierto, mientras que los datos creados con sessionStorage estarán solo disponibles mientras la ventana que los creó no es cerrada


Existen dos nuevos métodos específicos de esta API incluidos para crear y leer un valor en el espacio de
almacenamiento:

	1 - setItem(clave, valor) Este es el método que tenemos que llamar para crear un ítem. El ítem será creado con una clave y un valor de acuerdo a los atributos especificados. Si ya existe un ítem con la misma clave, será actualizado al nuevo valor, por lo que este método puede utilizarse también para modificar datos previos.

	2 - getItem(clave) Para obtener el valor de un ítem, debemos llamar a este método especificando la clave del ítem que queremos leer. La clave en este caso es la misma que declaramos cuando creamos al ítem con
	setItem().

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Web Storage API</title>
	<style type="text/css" media="screen">
		#cajaformulario{
			float: left;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#cajadatos{
			float: left;
			width: 400px;
			margin-left: 20px;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#clave, #texto{
			width: 200px;
		} 
		#cajadatos >div{
			padding: 5px;
			border-bottom: 1px solid #999999;
		}
	</style>		
	<script type="text/javascript">
		function iniciar(){
			var boton=document.getElementById('grabar');
			boton.addEventListener('click', nuevoItem, false);
		}
		function nuevoItem(){
			var clave=document.getElementById('clave').value;
			var valor=document.getElementById('texto').value;
			sessionStorage.setItem(clave,valor);
			mostrar(clave);
		} 
		function mostrar(clave){
			var cajadatos=document.getElementById('cajadatos');
			var valor=sessionStorage.getItem(clave);
			cajadatos.innerHTML='<div>'+clave+' - '+valor+'</div>';
		} 
		window.addEventListener('load', iniciar, false);
	</script>
</head>
<body>
	<section id="cajaformulario">
		<form name="formulario">
			<p>Clave:<br><input type="text" name="clave" id="clave"></p>
			<p>Valor:<br><textarea name="text" id="texto"></textarea></p>
			<p><input type="button" name="grabar" id="grabar" value="Grabar"></p>
		</form>
	</section>
	<section id="cajadatos">
		No hay información disponible
	</section>
</body>
</html>
<!-- 
Los métodos son parte de sessionStorage y son llamados con la sintaxis sessionStorage.setItem(). 

La función nuevoitem() es ejecutada cada vez que el usuario hace clic en el botón del formulario. Esta función crea un ítem con la información insertada en los campos del formulario y luego llama a la función mostrar(). Esta última función lee el ítem de acuerdo a la clave recibida usando el método getItem() y muestra su valor en la pantalla

Esta API también ofrece una sintaxis abreviada para crear y leer ítems desde el espacio de almacenamiento. Podemos usar la clave del ítem como una propiedad y acceder a su valor de esta manera.

Este método usa en realidad dos tipos de sintaxis diferentes de acuerdo al tipo de información que estamos usando para crear el ítem. Podemos encerrar una variable representando la clave entre corchetes (por ejemplo,
sessionStorage[clave]=valor) o podemos usar directamente el nombre de la propiedad (por ejemplo,
sessionStorage.miitem=valor)


<script type="text/javascript">
	function iniciar(){
		var boton=document.getElementById('grabar');
		boton.addEventListener('click', nuevoitem, false);
	}
	function nuevoitem(){
		var clave=document.getElementById('clave').value;
		var valor=document.getElementById('texto').value;
		sessionStorage[clave]=valor;
		mostrar(clave);
	} 
	function mostrar(clave){
		var cajadatos=document.getElementById('cajadatos');
		var valor=sessionStorage[clave];
		cajadatos.innerHTML='<div>'+clave+' - '+valor+'</div>';
	} 
	window.addEventListener('load', iniciar, false);
</script>

Leyendo datos

El ejemplo pasado solo lee el ultimo item gravado, vamos a ver como podemos leer los demas:

	1 - length: Esta propiedad retorna el número de ítems guardados trabaja como el length de JS.

	2 - key(índice) Los ítems son almacenados secuencialmente, enumerados con un índice automático que comienzo por 0. con este item podemos leer un indice en espesifico (trabaja como los arreglos).


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Web Storage API</title>
	<style type="text/css" media="screen">
		#cajaformulario{
			float: left;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#cajadatos{
			float: left;
			width: 400px;
			margin-left: 20px;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#clave, #texto{
			width: 200px;
		} 
		#cajadatos >div{
			padding: 5px;
			border-bottom: 1px solid #999999;
		}
	</style>		
	<script type="text/javascript">
		function iniciar(){
			var boton=document.getElementById('grabar');
			boton.addEventListener('click', nuevoitem, false);
			mostrar();
		} 
		function nuevoitem(){
			var clave=document.getElementById('clave').value;
			var valor=document.getElementById('texto').value;
			sessionStorage.setItem(clave,valor);
			mostrar();
			document.getElementById('clave').value='';
			document.getElementById('texto').value='';
		} 
		function mostrar(){
			var cajadatos=document.getElementById('cajadatos');
			cajadatos.innerHTML='';
			for(var f=0;f<sessionStorage.length;f++){
				var clave=sessionStorage.key(f);
				var valor=sessionStorage.getItem(clave);
				cajadatos.innerHTML+='<div>'+clave+' - '+valor+'</div>';
			}
		} 
		window.addEventListener('load', iniciar, false);
	</script>
</head>
<body>
	<section id="cajaformulario">
		<form name="formulario">
			<p>Clave:<br><input type="text" name="clave" id="clave"></p>
			<p>Valor:<br><textarea name="text" id="texto"></textarea></p>
			<p><input type="button" name="grabar" id="grabar" value="Grabar"></p>
		</form>
	</section>
	<section id="cajadatos">
		No hay información disponible
	</section>
</body>
</html>


Eliminar datos

Esta Api ofrece dos metodos para elminiar datos...

	1 - removeItem(clave) Este metodo funciona para remover una clave individual la clave para identificar este item es la misma con la que se creo con setItem().

	2 - clear() Este metodo borrara todo los items que se han guardado.

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Web Storage API</title>
	<style type="text/css" media="screen">
		#cajaformulario{
			float: left;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#cajadatos{
			float: left;
			width: 400px;
			margin-left: 20px;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#clave, #texto{
			width: 200px;
		} 
		#cajadatos >div{
			padding: 5px;
			border-bottom: 1px solid #999999;
		}
	</style>		
	<script type="text/javascript">
		function iniciar(){
			var boton=document.getElementById('grabar');
			boton.addEventListener('click', nuevoitem, false);
			mostrar();
		} 
		function nuevoitem(){
			var clave=document.getElementById('clave').value;
			var valor=document.getElementById('texto').value;
			sessionStorage.setItem(clave,valor);
			mostrar();
			document.getElementById('clave').value='';
			document.getElementById('texto').value='';
		} 
		function mostrar(){
			var cajadatos=document.getElementById('cajadatos');
			cajadatos.innerHTML='<div><button onclick="eliminarTodo()">Eliminar Todo</button></div>';
			for(var f=0;f<sessionStorage.length;f++){
				var clave=sessionStorage.key(f);
				var valor=sessionStorage.getItem(clave);
				cajadatos.innerHTML+='<div>'+clave+' - '+valor+'<br><button onclick="eliminar(\''+clave+'\')">Eliminar</button></div>';
			}
		} 
		function eliminar(clave){
			if(confirm('Está Seguro?')){
				sessionStorage.removeItem(clave);
				mostrar();
			}
		} 
		function eliminarTodo(){
			if(confirm('Está Seguro?')){
				sessionStorage.clear();
				mostrar();
			}
		} 
		window.addEventListener('load', iniciar, false);
	</script>
</head>
<body>
	<section id="cajaformulario">
		<form name="formulario">
			<p>Clave:<br><input type="text" name="clave" id="clave"></p>
			<p>Valor:<br><textarea name="text" id="texto"></textarea></p>
			<p><input type="button" name="grabar" id="grabar" value="Grabar"></p>
		</form>
	</section>
	<section id="cajadatos">
		No hay información disponible
	</section>
</body>
</html>


Las funciones eliminar() y eliminarTodo() se encargan de eliminar el ítem seleccionado o limpiar el espacio
de almacenamiento, respectivamente. Cada función llama a la función mostrar() al final para actualizar la lista de ítems en pantalla.

para sessionStorage cada ventana es considerada una instancia diferente de la
aplicación y la información de la sesión no se propaga entre ellas.
	

localStorage()


Mantendrá la información disponible permanentemente. Con localStorage, finalmente podemos grabar largas cantidades de datos y dejar que el usuario decida si la información es útil y debe ser conservada o no

El sistema usa la misma interface que sessionStorage,  Solo hay que sustituir del prefijo session por local quedando del a siguiente manera localStorage


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Web Storage API</title>
	<style type="text/css" media="screen">
		#cajaformulario{
			float: left;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#cajadatos{
			float: left;
			width: 400px;
			margin-left: 20px;
			padding: 20px;
			border: 1px solid #999999;
		} 
		#clave, #texto{
			width: 200px;
		} 
		#cajadatos >div{
			padding: 5px;
			border-bottom: 1px solid #999999;
		}
	</style>		
	<script type="text/javascript">
		function iniciar(){
			var boton=document.getElementById('grabar');
			boton.addEventListener('click', nuevoitem, false);
			mostrar();
		}
		function nuevoitem(){
			var clave=document.getElementById('clave').value;
			var valor=document.getElementById('texto').value;
			localStorage.setItem(clave,valor);
			mostrar();
			document.getElementById('clave').value='';
			document.getElementById('texto').value='';
		} 
		function mostrar(){
			var cajadatos=document.getElementById('cajadatos');
			cajadatos.innerHTML='';
			for(var f=0;f<localStorage.length;f++){
				var clave=localStorage.key(f);
				var valor=localStorage.getItem(clave);
				cajadatos.innerHTML+='<div>'+clave+' - '+valor+'</div>';
			}
		} 
		window.addEventListener('load', iniciar, false);
	</script>
</head>
<body>
	<section id="cajaformulario">
		<form name="formulario">
			<p>Clave:<br><input type="text" name="clave" id="clave"></p>
			<p>Valor:<br><textarea name="text" id="texto"></textarea></p>
			<p><input type="button" name="grabar" id="grabar" value="Grabar"></p>
		</form>
	</section>
	<section id="cajadatos">
		No hay información disponible
	</section>
</body>
</html>


Evento STORAGE

	storage: Este evento será disparado por la ventana cada vez que un cambio ocurra en el espacio de almacenamiento. Puede ser usado para informar a cada ventana abierta con la misma aplicación que los datos han cambiado en el espacio de almacenamiento y que se debe hacer algo al respecto.


<script type="text/javascript">
	function iniciar(){
		var boton=document.getElementById('grabar');
		boton.addEventListener('click', nuevoitem, false);
		window.addEventListener("storage", mostrar, false); //aqui el evento sotrage
		mostrar();
	} 
	function nuevoitem(){
		var clave=document.getElementById('clave').value;
		var valor=document.getElementById('texto').value;
		localStorage.setItem(clave,valor);
		mostrar();
		document.getElementById('clave').value='';
		document.getElementById('texto').value='';
	} 
	function mostrar(){
		var cajadatos=document.getElementById('cajadatos');
		cajadatos.innerHTML='';
		for(var f=0;f<localStorage.length;f++){
			var clave=localStorage.key(f);
			var valor=localStorage.getItem(clave);
			cajadatos.innerHTML+='<div>'+clave+' - '+valor+'</div>';
		}
	} 
	window.addEventListener('load', iniciar, false);
</script>

Tipo de almacenamiento

Dos mecanismos diferentes son ofrecidos para almacenar datos:
	1 	- 	sessionStorage Este mecanismo mantiene la información almacenada solo disponible para una simple ventana y solo hasta que la ventana es cerrada.
	2 	-	localStorage Este mecanismo almacena datos de forma permanente. Estos datos son compartidos por todas las ventanas que están ejecutando la misma aplicación y estarán disponibles a menos que el usuario decida que ya no los necesita.


Métodos
La API incluye una interface común para cada mecanismo que cuenta con nuevos métodos, propiedades y eventos:

	1 	-	setItem(clave, valor) Este método crea un nuevo ítem que es almacenado en el espacio de almacenamiento reservado para la aplicación. El ítem está compuesto por un par clave/valor creado a partir de los atributos clave y valor.
	2 	- 	getItem(clave) Este método lee el contenido de un ítem identificado por la clave especificada por el atributo clave. El valor de esta clave debe ser el mismo usado cuando el ítem fue creado con el método setItem().
	3 	-	key(índice) Este método retorna la clave del ítem encontrado en la posición especificada por el atributo índice dentro del espacio de almacenamiento.
	4 	- 	removeItem(clave) Este método elimina un ítem con la clave especificada por el atributo clave. El valor de esta clave debe ser el mismo usado cuando el ítem fue creado por el método setItem().
 	5 	- 	clear() - Este método elimina todos los ítems en el espacio de almacenamiento reservado para la aplicación. 


Propiedades
	1 	- 	length Esta propiedad retorna el número de ítems disponibles en el espacio de almacenamiento reservado para la aplicación.

Eventos
	1 	- 	storage Este evento es disparado cada vez que un cambio se produce en el espacio de almacenamiento reservado para la aplicación.