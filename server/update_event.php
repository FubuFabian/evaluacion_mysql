<?php
 
require("./conector.php");
session_start();

if (isset($_SESSION['username'])) {
	
	$response['sesion'] = "OK";
	
	$host = "localhost";
	$hostUser = "examen_admin";
	$hostPass = "12345";
	$database = "examen_db";

	$con = new ConectorBD($host,$hostUser,$hostPass);
	$response['conexion'] = $con->initConexion($database);
	
	if($response['conexion']=="OK"){
	
		$tabla = "eventos";
		$data['fecha_inicio'] = "'".$_POST['start_date']."'";
		$data['fecha_fin'] = "'".$_POST['end_date']."'";
		$data['hora_inicio'] = "'".$_POST['start_hour']."'";
		$data['hora_fin'] = "'".$_POST['end_hour']."'";
		
		if($con->actualizarRegistro($tabla,$data," id='".$_POST['id']."'")){
			$response['actualizar'] = "OK";
		}else{
			$response['actualizar'] = "No se pudo actualizar el evento";
		}
		
	}
	
	$con->cerrarConexion();

	}else{
		$response['sesion'] = "Sesion no iniciada";
	}
	
echo json_encode($response)

?>
