<html>
	<head>
		<title>Prueba</title>
		<style type="text/css">
			body {
    		color: purple;
    		background-color: #d8da3d }	
		
		</style>
		
		
	</head>
	<body> 
		<div style="font-size: 40" align="center">2TiemposLibres</div>
		<div style="position: absolute;left: 40%;top: 30%">
		<form action="login.php" method="post">
			
				<div >Usuario</div>
				<div><INPUT type="text" size=20 name="usuario"></div>
					
				<div>Password</div>
				<div><INPUT type="password" size=20 name="password"></div>
			
					
				<div style="position: relative; top: 14%"><INPUT type="submit" value="Enviar" onclick="alert('caca')"></div>
					
		</form>	
		<form action="subirarchivo.php" method="post" enctype="multipart/form-data">
			<div><input type="file" name="archivo"></div>
			<div><INPUT type="submit" value="Subir archivo"></div>			
		</form>
		</div>	
	</body>
</html>