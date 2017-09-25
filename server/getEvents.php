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
		
		$tablas = ["eventos"];
		$consulta = $con->consultar($tablas,['id','titulo','fecha_inicio','hora_inicio','fecha_fin','hora_fin','dia_completo'],"WHERE usuario='".$_SESSION['username']."'"); 
		
		if($consulta->num_rows!=0){
			$response['consulta'] = "OK";
			$i=0;
			while ($fila = $consulta->fetch_assoc()) {
        		$response['eventos'][$i]['id']=$fila['id'];
        		$response['eventos'][$i]['title']=$fila['titulo'];
        		$response['eventos'][$i]['allDay']=$fila['dia_completo'];
        		$response['eventos'][$i]['start']=$fila['fecha_inicio']."T".$fila['hora_inicio'];
        		$response['eventos'][$i]['end']=$fila['fecha_fin']."T".$fila['hora_fin'];
				$i++;
      		}
		}else{
			$response['consulta'] = "No hay eventos para este usuario";
		}
		
	}
	
	$con->cerrarConexion();

}else{
	$response['sesion'] = "Sesion no iniciada";
}
	
echo json_encode($response)

?>
