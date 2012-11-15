<!-- 
API GEO localizacion 

Esta Api aprovecha nuevos sistemas como triangulacion y GPS para encontrar la localizacion del usuario

Existen tres metodos provistos para esta API

1 - getCurrentPosition(ubicacion, error, configuracion) Este metodo es utulizado para consultas individuales
	puede recibir hasta tres atributos: 
			1 - una funcion para procesar la ubicacion retornada
			2 - una funcion para procesar los errores
			3 - y un objeto para configurar como la informacion sera adquirida 
			NOTA solo el primer atributo es obligatorio 

2 - watchPosition(ubicacion, error, configuracion) Este metodo es similar al anterior solo que este comienza 	 un proceso de vigilancia para detectar nuevas ubicaciones, reptiendo el proceso en un determinado periodo 	   de tiempo deacuerdo a su configuracion 

3 - clearWach(id) El metodo watchPosition() retorna un valor que puede ser almacenado en una variable para 		luego ser usada como referencia para ser usado por clearWatch() y asi detener la detecion de ubicacion o 	 vigilancia 
-->


<!--
getCurrentPosition()
el objeto position tiene dos atributos 
	"coords" este atributo contiene la ubicacion del dispotivo estos valores son accesibles por algunos atributos que son:
			1 - latitude: "latitud" 
			2 - longitude: "longitud"
			3 - altitude: "altitud en metros"
			4 - accuaracy: "exactitud en metros"
			5 - altitudeAccuaracy: "exactitud de altura en metros"
			6 - heading: direccion en grados
			7 - speed: velocidad en metros por segundos

	"timestamp" este atributo  indica el momento en el que 	la informacion fue adquirida (en formato timestamp)

<html>
<head>
	<title>Geo localizacion</title>
	<script type="text/javascript">
		function iniciar(){
			var boton=document.getElementById('obtener');
			boton.addEventListener('click', obtener, false);
		} 
		function obtener(){
			navigator.geolocation.getCurrentPosition(mostrar,errores);
		} 
		function mostrar(posicion){
			var ubicacion=document.getElementById('ubicacion');
			var datos='';
			datos+='Latitud: '+posicion.coords.latitude+'<br>';
			datos+='Longitud: '+posicion.coords.longitude+'<br>';
			datos+='Exactitud: '+posicion.coords.accuracy+'mts.<br>';
			ubicacion.innerHTML=datos;
		} 
		function errores(error){
			alert('Error: '+error.code+' '+error.message);
		}
		window.addEventListener('load', iniciar, false);
	</script>
</head>
<body>
	<section id="ubicacion">
		<button id="obtener">Obtener mi Ubicación</button>
	</section>
</body>
<html>

getCurrentPosition(ubicacion, error, configuracion)

este objeto contiene hasta tres posibles propiedades

		1 - 	enableHighAccuracy Esta es una propiedad booleana para informar al sistema que requerimos de la información más exacta que nos pueda ofrecer. El navegador intentará obtener esta información a través de sistemas como GPS, por ejemplo, para retornar la ubicación exacta del dispositivo. Estos son sistemas que consumen muchos recursos, por lo que su uso debería estar limitado a circunstancias muy específicas. Para evitar consumos innecesarios, el valor por defecto de esta propiedad es false (falso). 
	
		2 - 	timeout Esta propiedad indica el tiempo máximo de espera para que la operación finalice. Si la información de la ubicación no es obtenida antes del tiempo indicado, el error  TIMEOUT es retornado. Su valor es en milisegundos.

		3 - 	maximumAge Las ubicaciones encontradas previamente son almacenadas en un caché en el sistema. Si consideramos apropiado recurrir a la información grabada en lugar de intentar obtenerla desde el sistema (para evitar consumo de recursos o para una respuesta rápida), esta propiedad puede ser declarada con un tiempo límite específico. Si la última ubicación almacenada es más vieja que el valor de este atributo entonces una nueva ubicación es solicitada al sistema. Su valor es en milisegundos.

<html>
<head>
	<title>Geo localizacion</title>
	<script type="text/javascript">
		function iniciar(){
			var boton=document.getElementById('obtener');
			boton.addEventListener('click', obtener, false);
		} 
		function obtener(){
			var geoconfig={
			enableHighAccuracy: true,
			timeout: 10000,
			maximumAge: 60000
		};
		navigator.geolocation.getCurrentPosition(mostrar, errores, geoconfig);
		}
		function mostrar(posicion){
			var ubicacion=document.getElementById('ubicacion');
			var datos='';
			datos+='Latitud: '+posicion.coords.latitude+'<br>';
			datos+='Longitud: '+posicion.coords.longitude+'<br>';
			datos+='Exactitud: '+posicion.coords.accuracy+'mts.<br>';
			ubicacion.innerHTML=datos;
		}
		function errores(error){
			alert('Error: '+error.code+' '+error.message);
		} 
		window.addEventListener('load', iniciar, false);
			</script>
</head>
<body>
	<section id="ubicacion">
		<button id="obtener">Obtener mi Ubicación</button>
	</section>
</body>
<html>
-->