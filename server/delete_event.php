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
		if($con->eliminarRegistro($tabla,"id='".$_POST['id']."'")){
			$response['borrar'] = "OK";
		}else{
			$response['borrar'] = "No se pudo borrar evento";
		}
	
	}
	
	$con->cerrarConexion();

}else{
	$response['sesion'] = "Sesion no iniciada";
}
	
echo json_encode($response)

?>
