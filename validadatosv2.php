<?php

init_set("display_errors",1);

	/*class Datos{
		public $fecha;
		public $cp;
		public $telf;
	}*/
	
	/*class Respuesta{
		public $mensaje;
		public $datos = new Datos();
	}*/

	//Metodo que comprueba si el formato introducido en la Fecha es válido.
	function validaFecha($fecha){
		$tamFecha = strlen($fecha);
		if($tamFecha==10){
			$dia= substr($fecha, 0,2);
			$mes = substr($fecha, 3,2);
			$year = substr($fecha, 6,4);
			$b1 = substr($fecha,2,1);
			$b2 = substr($fecha, 5,1);
			$diavalido = is_numeric($dia);
			$mesvalido = is_numeric($mes);
			$yearvalido = is_numeric($year);
			
			if((($b1 and $b2)=='/') and (($diavalido and $mesvalido and $yearvalido)==TRUE)){
				return TRUE;				
			}
			else {
				return FALSE;
			}	
		}
		else {
			return FALSE;
		}
		
	}
	
	//Metodo para comprobar si el codigo postal es válido.
	function validaCP($codigo){
		$tamCP = strlen($codigo);
		$numCP = is_numeric($codigo);
		if($tamCP==5 and $numCP==TRUE){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	//Metodo para comprobar si el telefono es válido.
	function validaTelf($telf){
		$tamtelf = strlen($telf);
		$numtelf = is_numeric($telf);
		if($tamtelf==9 and $numtelf==TRUE){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	$fechaN = $_POST["fecha_nacimiento"];
	$codigopostal = $_POST["codigo_postal"];
	$telefono = $_POST["telefono"];
	
    $fechaError = "La fecha debe tener el siguiente formato dd/mm/aaaa y dia, mes y año deben ser númericos<br />";
	$codigoError = "El codigo postal debe estar compuesto por 5 digitos.<br />";
	$telefonoError = "El telefono debe estar formado por 9 digitos.<br />";	
	
	
	
	//$respuesta = new Respuesta();
	$mens = "";
	if(validaFecha($fechaN)== FALSE){
		$mens = $mens.$fechaError;
	}
	
	if(validaCP($codigopostal)== FALSE){
		$mens = $mens.$codigoError;
	}
	
		
	if(validaTelf($telefono)== FALSE){
		$mens = $mens.$telefonoError;
	}
	
	//Esto es lo que has hecho tu
	//$cadenaresp = "{mensaje = '$mens'}";
	
	//Esto es lo que yo haría, por ejemplo, porque generar la cadena cuando se trata de muchas cosas es mas complejo.
	$respuesta=array();
	$respuesta['mensaje']=$mens;
	echo json_encode($respuesta);
	
	//Es muy sencillo, te vas generando el array solo, y luego le haces en encode, para estructuras complejas es la polla.
	
	//$respuesta->mensaje = $mens;
	//echo json_encode($respuesta);
	//echo $cadenaresp;
	
	
?>