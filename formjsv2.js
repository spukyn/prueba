/**
 * @author spukyn
 */

var READY_STATE_COMPLETE=4;
var peticion_http=null;

function inicializaXHR(){
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}

function crea_query_string(){
	var fechaN = document.getElementById("fecha_nacimiento");
	var codigopostal = document.getElementById("codigo_postal");
	var telf = document.getElementById("telefono");
	
	return "fecha_nacimiento=" + encodeURIComponent(fechaN.value) +
			"&codigo_postal=" + encodeURIComponent(codigopostal.value) +
			"&telefono=" + encodeURIComponent(telf.value) +
			"&nocache=" + Math.random();
}

function valida(){
	peticion_http = inicializaXHR();
	
	if(peticion_http){
		peticion_http.onreadystatechange = procesaRespuesta;
		peticion_http.open("POST","http://localhost/Prueba/validadatosv2.php",true);
		peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
		var query_string = crea_query_string();
		peticion_http.send(query_string);
	}
}

function procesaRespuesta(){
	if(peticion_http.readyState == READY_STATE_COMPLETE){
		if(peticion_http.status== 200){
			var respuesta_json = peticion_http.responseText;
			var objeto_json = eval("("+respuesta_json+")");	
			var salida = "";
			salida = salida + objeto_json.mensaje + objeto_json.datos.fecha + "\n" + objeto_json.datos.cp + "\n" + objeto_json.datos.telf;
			
			//document.getElementById("respuesta").innerHTML= salida;+ "\n" + objeto_json.datos.cp + "\n" + objeto_json.datos.telf;

			document.getElementById("fecha_nacimiento").value=""; //no se si lo de value es la forma mas adecuada de hacer esto..
			document.getElementById("codigo_postal").value="";
			document.getElementById("telefono").value="";
			if(!objeto_json.mensaje){
				alert("Registro completo");
			}
			else{
				alert(salida);
			}
			
		}
	}
}