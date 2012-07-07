<html>
	<head>
		<title>Subir archivo</title>
		
	</head>
	
	<body>
		<?php
			$localhost = "192.168.1.33";
			$conexion= ftp_connect($localhost);
			if($conexion){
				echo "Se ha conectado al servidor<br>";
			}
			else{
				echo "Fallo en la conexión al servidor";
			}
		
			$logueo = ftp_login($conexion, "ftp_user", "0000");
			
			if($logueo){
				echo "Logueo correcto al server.<br>";
			}
			else{
				echo "Fallo al loguear en el server.";
			}
			
			//Pongo el server en modo pasivo para que la iniciativa la tome el cliente
			ftp_pasv($conexion, TRUE);
			$path = "/var/www/directorio_ftp/";
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