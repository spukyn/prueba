<html>
	<head>
		<title>Subir archivo</title>
		
	</head>
	
	<body>
		<?php
			// Primero creamos un ID de conexión a nuestro servidor
			$cid = ftp_connect("ftp://ftp.spukyn.com/");
			// Luego creamos un login al mismo con nuestro usuario y contraseña
			$resultado = ftp_login($cid, "spukyn","a1a1a1");
			// Comprobamos que se creo el Id de conexión y se pudo hacer el login
			if ((!$cid) || (!$resultado)) {
				echo "Fallo en la conexión"; die;
			} else {
				echo "Conectado.";
			}
			// Cambiamos a modo pasivo, esto es importante porque, de esta manera le decimos al 
			//servidor que seremos nosotros quienes comenzaremos la transmisión de datos.
			ftp_pasv ($cid, true) ;
			echo "<br> Cambio a modo pasivo<br />";
			// Nos cambiamos al directorio, donde queremos subir los archivos, si se van a subir a la raíz
			// esta por demás decir que este paso no es necesario. En mi caso uso un directorio llamado boca
			ftp_chdir($cid, "carpetaftp");
			echo "Cambiado al directorio necesario";   
			// Tomamos el nombre del archivo a transmitir, pero en lugar de usar $_POST, usamos $_FILES que le indica a PHP
			// Que estamos transmitiendo un archivo, esto es en realidad un matriz, el segundo argumento de la matriz, indica
			// el nombre del archivo
			$local = $_FILES["archivo"]["name"];
			// Este es el nombre temporal del archivo mientras dura la transmisión
			$remoto = $_FILES["archivo"]["tmp_name"];
			// El tamaño del archivo
			$tama = $_FILES["archivo"]["size"];
			echo "<br />$local<br />";
			echo "$remoto<br />";
			echo "subiendo el archivo...<br />";
			// Juntamos la ruta del servidor con el nombre real del archivo
			$ruta = "/home/spukyn/carpetaftp/" . $local;
			// Verificamos si no hemos excedido el tamaño del archivo
		//	if (!$tama<=$_POST["MAX_FILE_SIZE"]){
		//		echo "Excede el tamaño del archivo...<br />";
		//	} else {
				// Verificamos si ya se subio el archivo temporal
				if (is_uploaded_file($remoto)){
					// copiamos el archivo temporal, del directorio de temporales de nuestro servidor a la ruta que creamos
					copy($remoto, $ruta);		
				}
				// Sino se pudo subir el temporal
				else {
					echo "no se pudo subir el archivo " . $local;
				}
			//}
			echo "Ruta: " . $ruta;
			//cerramos la conexión FTP
			ftp_close($cid);
		?>
	</body>
</html>