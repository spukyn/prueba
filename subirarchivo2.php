<html>
	<head>
		<title>Subir archivo a server FTP</title>
	</head>
	<body>
		<?
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
			$rutafilelocal = $_POST['archivo'];
			$archivo = $path.basename($rutafilelocal);
			
			$subido =false;
			$subido = ftp_put ($conexion, basename($rutafilelocal), $rutafilelocal, FTP_BINARY);
			
			if($subido){
				echo "El archivo subio con exito"; 
			} 
			else {
				 echo "Se ha producido un error"; 
			}
		?>
	</body>
</html>