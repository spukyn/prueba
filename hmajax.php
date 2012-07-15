
<html>
	<head>
		<title>Hola Mundo Ajax</title>
		
		<script type="text/javascript">
			function descargaArchivo(){
				if(window.XMLHttpRequest){
					peticion_http = new XMLHttpRequest();
				}
				else if(window.ActiveXObject){
					peticion_http = new  ActiveXObject("Microsoft.XMLHTTP");
				}
				
				peticion_http.onreadystatechange = muestraContenido;
				
				peticion_http.open('GET','http://localhost/Prueba/holamundo.txt',true);
				peticion_http.send(null);	
				
				function muestraContenido(){
					if(peticion_http.readyState == 4){
						alert("hola holaaaaa");
						if(peticion_http.status == 200){
							alert(peticion_http.responseText);
						}
					}
				}	
				
			}
			
			window.onload = descargaArchivo;
			
		</script>
	</head>
	<body>
		
	</body>
</html>