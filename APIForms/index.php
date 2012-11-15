
<!-- api form html5 
Nuevos atributos del API Forms

Placeholder  -  representa una referencia corta una palabra o frase para ayudar al usuario esta se representa dentro del input
ej. <input type="text" name="nombre" id="nombre" placeholder="aqui va tu nombre">


Required  -  es un atributo boleano no dejara que el formulario se envie en caso de que este sea false el atributo required revisa que el input este lleno y validado
ej. <input type="email" name="tuemail" required>


Multiple  -   este es otro atributo boleano qu puede ser usado en los campos de email o file para permitir multiples ingresos de estos mismos 
ej. <input type="email" name="tuemail" multiple>


Autofocuso  -  este nuevo atributo de la API forms de HTML5 sirve para poner el foco automaticamente en el input donde lo hemos colocado

ej. <input type="email" name="tuemail" autofocus>


Pattern  -  Este atributo en lo personal es unos de mis preferidos, patterns es un atributo de validacion que puede ser personalizado mediante expresiones regulares, incluso puede incluir el atributo tittle  para personalizar el mensaje de error en est caso solo aceptaremos como maximo cinco numeros....

ej.   <input pattern="[0-9]{5}" type="text" name="numero" title="solo se aceptan 5 numeros">


datalist  -   Este atributo funciona  para realizar una lista tipo de sugerencia o autoacmpletador para el usuario que va a escribir dentro de nuestro input 

ej
<datalist id="informacion">  
				<option value="123123123" label="Teléfono 1">  
				<option value="456456456" label="Teléfono 2"> 
</datalist>
<input type="tel" name="telefono" id="telefono" list="informacion"><br>


Progress   -  NOTA: este atributo no es espesifico de los formularios pero como representa el progreso de una tarea usualmente los formularios son parte de una tarea, "progress" es una barra de progreso donde su atributo max espesifica el valor maximo de este barra y value el valor que se ha recorrido de esta barra

ej. <progress max="100" value="50"></progress>



Meter    -   Similiar a progress pero la gran diferencia es que meter no es usado para mostrar un progreso si no una escala o una medida como el numero de visitas por asi decirlo
<meter max="100" value="50"></meter>




<!DOCTYPE html> 
<html lang="es"> 
<head> 
 <title>Formularios</title> 
</head> 
<body>  
	<section>    
		<form name="miformulario" id="miformulario" method="get">      
			<input type="text" name="nombre" id="nombre">      <br>
			<input type="submit" value="Enviar">    <br>
			<input type="email" name="miemail" id="miemail"><br>
			<input type="email" name="miemail" id="miemail"><br>
			<input type="url" name="miurl" id="miurl"><br>
			<input type="tel" name="telefono" id="telefono">
			<input type="number" name="numero" id="numero" min=”0” max+”10”  step=”5”><br>
			<input type="range" name="numero" id="numero" min=”0” max=”10” step=”5”><br>
			<input type="date" name="fecha" id="fecha"><br>
			<input type="week" name="semana" id="semana"><br>
			<input type="month" name="mes" id="mes"><br>
			<input type="time" name="hora" id="hora"><br>
			<input type="datetime-local" name="tiempolocal" id="tiempolocal"><br>
			<input type="color" name="micolor" id="micolor"><br>
			<input type="email" name="miemail" id="miemail" multiple><br>
			<datalist id="informacion">  
				<option value="123123123" label="Teléfono 1">  
				<option value="456456456" label="Teléfono 2"> 
			</datalist><br>
			<input type="tel" name="telefono" id="telefono" list="informacion"><br>
			<progress max="100" value="50"></progress>
			<meter max="100" value="50"></meter>
		</form>  
	</section> 
</body>
</html>
-->

<!-- 
setCustomValidity() 
Los navegadores que soportan HTML5 muestran un mensaje de error cuando el usuario intenta enviar un formulario que contiene un campo inválido. Podemos crear mensajes para nuestros propios requisitos de validación usando el método setCustomValidity(mensaje). Con este método especificamos un error personalizado que mostrará un mensaje cuando el formulario es enviado. Cuando un mensaje vacío es declarado, el error es anulado.


 <!DOCTYPE html>
  <html lang="es"> 
  <head>  
  	<title>Formularios</title>  
  	<script>    
  	function iniciar(){      
  		nombre1=document.getElementById("nombre");      
  		nombre2=document.getElementById("apellido");     
  		nombre1.addEventListener("input", validacion, false);      
  		nombre2.addEventListener("input", validacion, false);      
  		validacion();    
  	}    
  	function validacion(){      
  		if(nombre1.value=='' && nombre2.value==''){        
  			nombre1.setCustomValidity('inserte al menos un nombre');        
  			nombre1.style.background='#FFDDDD';      
  		}else{        
  			nombre1.setCustomValidity('');        
  			nombre1.style.background='#FFFFFF';      
  		}    
  	}    
  	window.addEventListener("load", iniciar, false);  
  </script> 
</head> 
<body>  
	<section>    
		<form name="registracion" method="get">      
			Nombre:      
			<input type="text" name="nombre" id="nombre">      
			Apellido:      
			<input type="text" name="apellido" id="apellido">     
			<input type="submit" id="send" value="ingresar">    
		</form>  
	</section> 
</body> 
</html>

-->
<!-- 
El evento invalid 
Cada vez que el usuario envía el formulario, un evento es disparado si un campo inválido es detectado. El evento es llamado invalid y es disparado por el elemento que produce el error. Podemos agregar una escucha para este evento y así ofrecer una respuesta personalizada, como en el siguiente ejemplo: 


 <!DOCTYPE html> 
 <html lang="es"> 
 <head>  
 	<title>Formularios</title>  
 	<script>    
 	function iniciar(){      
 		edad=document.getElementById("miedad");      
 		edad.addEventListener("change", cambiarrango, false);      
 		document.informacion.addEventListener("invalid", validacion, true);      
 		document.getElementById("enviar").addEventListener("click", enviar, false);    
 	}    
 	function cambiarrango(){      
 		var salida=document.getElementById("rango");      
 		var calc=edad.value-20;      
 		if(calc<20){        
 			calc=0;        
 			edad.value=20;      
 		}      
 		salida.innerHTML=calc+' a '+edad.value;    
 	}    
 	function validacion(e){      
 		var elemento=e.target;      
 		elemento.style.background='#FFDDDD';    
 	}    
 	function enviar(){      
 		var valido=document.informacion.checkValidity();
      if(valido){        
      	document.informacion.submit();      
      }    
  }    
  window.addEventListener("load", iniciar, false);  
</script> 
</head> 
<body>  
	<section>    
		<form name="informacion" method="get">      
			Usuario:      
			<input pattern="[A-Za-z]{3,}" name="usuario" id="usuario" maxlength="10" required>      
			Email:      
			<input type="email" name="miemail" id="miemail" required>      
			Rango de Edad:      
			<input type="range" name="miedad" id="miedad" min="0" max="80" step="20" value="20">      
			<output id="rango">0 a 20</output>      
			<input type="button" id="enviar" value="ingresar">    
		</form>  
	</section> 
</body> 
</html>
-->

<!-- 
Validación en tiempo real 
Cuando abrimos el archivo con la plantilla del Listado 6-24 en el navegador, podremos notar que no existe una validación en tiempo real. Los campos son sólo validados cuando el botón “ingresar” es presionado. Para hacer más práctico nuestro sistema personalizado de validación, tenemos que aprovechar los atributos provistos por el objeto ValidityState. 
-->

<!--
 <!DOCTYPE html> 
 <html lang="es"> 
 <head>  
 	<title>Formularios</title>  
 	<script>    
 	function iniciar(){      
 		edad=document.getElementById("miedad");     
 		edad.addEventListener("change", cambiarrango, false);      
 		document.informacion.addEventListener("invalid",  validacion, true);      
 		document.getElementById("enviar").addEventListener("click", enviar, false);      
 		document.informacion.addEventListener("input", controlar, false);    
 	}    
 	function cambiarrango(){      
 		var salida=document.getElementById("rango");      
 		var calc=edad.value-20;      
 		if(calc<20){        
 			calc=0;        
 			edad.value=20;      
 		}      
 		salida.innerHTML=calc+' a '+edad.value;    
 	}    
 	function validacion(e){      
 		var elemento=e.target;      
 		elemento.style.background='#FFDDDD';    
 	}    
 	function enviar(){      
 		var valido=document.informacion.checkValidity();      
 		if(valido){        
 			document.informacion.submit();      
 		}    
 	}    
 	function controlar(e){      
 		var elemento=e.target;      
 		if(elemento.validity.valid){        
 			elemento.style.background='#FFFFFF';      
 		}else{       
 		elemento.style.background='#FFDDDD';      
 	}    
 }    
 window.addEventListener("load", iniciar, false);  
</script> 
</head> 
<body>  
	<section>    
		<form name="informacion" method="get">      
			Usuario:      
			<input pattern="[A-Za-z]{3,}" name="usuario" id="usuario" maxlength="10" required>      
			Email:
      <input type="email" name="miemail" id="miemail" required>      
      Rango de Edad:      
      <input type="range" name="miedad" id="miedad" min="0" max="80" step="20" value="20">      
      <output id="rango">0 a 20</output>      
      <input type="button" id="enviar" value="ingresar">    
  </form>  
</section> 
</body> 
</html>
-->