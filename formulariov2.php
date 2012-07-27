<html>
	<head>
		<link href="hojaestilo.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="formjsv2.js"></script>
		
	</head>
	<body>
		<div class="registro">
		<form>
			<div class="registroTitulo">REGISTRO</div>
			<label for="fecha_nacimiento">Fecha de nacimiento:</label>
			<input type="text" id="fecha_nacimiento" name="fecha nacimiento"/><br />
		
			<label for="codigo_postal">Codigo postal:</label>
			<input type="text" id="codigo_postal" name="codigo_postal"/><br />
			
			<label for="telefono">Telefono:</label>
			<input type="text" id="telefono" name="telefono"/><br />
			
			<input type="button" value="Validar" onclick="valida()" />			
		</form>
		</div>
		
	</body>
</html>