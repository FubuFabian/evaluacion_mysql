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
		$data['titulo'] = "'".$_POST['titulo']."'";
		$data['fecha_inicio'] = "'".$_POST['start_date']."'";
		$data['hora_inicio'] = "'".$_POST['start_hour']."'";
		$data['fecha_fin'] = "'".$_POST['end_date']."'";
		$data['hora_fin'] = "'".$_POST['end_hour']."'";
		$data['dia_completo'] = "'".$_POST['allDay']."'";
		$data['usuario'] = "'".$_SESSION['username']."'";
		
		if($con->insertData($tabla,$data)){
			$response['insercion'] = "OK";
		}else{
			$response['insercion'] = "No se pudo crear el nuevo evento";
		}
	
	}
	
	$con->cerrarConexion();

}else{
	$response['sesion'] = "Sesion no iniciada";
}
	
echo json_encode($response)

?>
