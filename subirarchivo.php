<html>
	<head>
		<title>Subir archivo</title>
		
	</head>
	
	<body>
		<?php
			$conexion= ftp_connect("ftp.spukyn.com");
			if($conexion){
				echo "Se ha conectado al servidor<br>";
			}
			else{
				echo "Fallo en la conexión al servidor";
			}
		
			$logueo = ftp_login($conexion, "spukyn", "a1a1a1");
			
			if($logueo){
				echo "Logueo correcto al server.<br>";
			}
			else{
				echo "Fallo al loguear en el server.";
			}
			
			//Pongo el server en modo pasivo para que la iniciativa la tome el cliente
			ftp_pasv($conexion, TRUE);
			$path = "/home/spukyn/";
			$archivo = $path.basename($_FILES['archivo']['name']);
			
			$subido =false;
			$subido = copy($_FILES['archivo']['tmp_name'], $archivo); 
			if($subido){
				echo "El archivo subio con exito"; 
			} 
			else {
				 echo "Se ha producido un error: ".$error; 
			}
			
			
		?>
	</body>
</html>