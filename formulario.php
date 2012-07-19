<html>
	<head>
		<script type="text/javascript" src="formjs.js"></script>
		
	</head>
	<body>
		<form>
			<label for="fecha_nacimiento">Fecha de nacimiento:</label>
			<input type="text" id="fecha_nacimiento" name="fecha nacimiento"/><br />
		
			<label for="codigo_postal">Codigo postal:</label>
			<input type="text" id="codigo_postal" name="codigo_postal"/><br />
			
			<label for="telefono">Telefono:</label>
			<input type="text" id="telefono" name="telefono"/><br />
			
			<input type="button" value="Validar" onclick="valida()" />			
		</form>
		
		<div id="respuesta"></div>
	</body>
</html>