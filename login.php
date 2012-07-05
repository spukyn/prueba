<?php 
	mysql_connect('localhost','root','root')or die ('Ha fallado la conexión;n: '.mysql_error());
	mysql_select_db('BBDDsystem')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
		
	$user = $_POST["usuario"];
	$pass = $_POST["password"];
			
	if($user!="" && $pass!=""){
		//pillo todos los resultados de la consulta.
		$result = mysql_query("SELECT password FROM Usuario WHERE idUsuario=\''.$user.'\'');
			//funcion que devuelve false si está vacia la consulta
			//creo que lo estructuras las columnas de la tabla como una matriz, es decir como un resultset de la clase java.sql
		 	if($row = mysql_fetch_array($result)){
				if($row["password"] == $pass){
			 		header("location: correcto.php");
				}
				else{
					header("location: wrongpass.php");
				}
			}
		 	else{
		 		header("location: nouser.php");
			 }
		     mysql_free_result($result);  			
			 mysql_close();
		}
?>