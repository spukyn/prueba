	var READY_STATE_UNINITIALIZED=0;
		var READY_STATE_LOADING=1;
		var READY_STATE_LOADED=2;
		var READY_STATE_INTERACTIVE=3;
		var READY_STATE_COMPLETE=4;

		var peticion_http;
		
		function cargarContenido(url,metodo,funcion){
			
			peticion_http = inicializaXHR();
			
			if(peticion_http){
				peticion_http.onreadystatechange=funcion;
				peticion_http.open(metodo,url,true);
				peticion_http.send(null);
			}
		}
		
		function inicializaXHR(){
			if(window.XMLHttpRequest){
				return new XMLHttpRequest();
			}
			else if(window.ActiveXObject){
				return new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		
		function muestraContenido(){
			if(peticion_http.readyState==READY_STATE_COMPLETE){
				if(peticion_http.status==200){
					alert(peticion_http.responseText);
				}
			}
		}
		
		function descargaArchivo(){
			var dir = document.getElementById("direccion");
			if(dir.value){
				cargarContenido(dir.value,"GET",muestraContenido);
			}
		}
		

