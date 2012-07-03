<html>
	<head>
		<title>Prueba</title>
	</head>
	<body >	
		<form action="index.php" method="post">
			Identificacion<br/>
			
			<td><b>Nombre de usuario</b></td>
			<TD>
				<INPUT type=text size=3 name="usuario">
			</TD><br/>
			
			<td><b>Password</b></td>
			<TD>
				<INPUT type=password size=3 name="password">
			</td>			
			<TD COLSPAN=2>
				<INPUT type="submit" value="Enviar">
			</TD>
		</form>	
		<?php session_start();
			mysql_connect('localhost','root','root')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
			mysql_select_db('BBDDsystem')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
		
			$user = $_POST["usuario"];
			$pass = $_POST["password"];
			
			if($user!="" && $pass!=""){
				//pillo todos los resultados de la consulta.
				$result = mysql_query('SELECT password FROM Usuario WHERE idUsuario=\''.$user.'\'');
				 //funcion que devuelve false si está vacia la consulta
				 //creo que lo estructuras las columnas de la tabla como una matriz, es decir como un resultset de la clase java.sql
				 if($row = mysql_fetch_array($result)){
			        if($row["password"] == $pass){
			 			echo "El usuario $user se ha logueado.";
					}
					else{
						echo "El password es incorrecto.";
					}
				 }
				 else{
		 			echo "El usuario $user no existe.";	
				 }
			     mysql_free_result($result);  			
				 mysql_close();
			}
		?>
			
	</body>
</html>