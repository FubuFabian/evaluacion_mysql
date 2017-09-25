<?php


require("./conector.php");

$host = "localhost";
$hostUser = "examen_admin";
$hostPass = "12345";
$database = "examen_db";

$user = $_POST['username'];
$pass = $_POST['password'];

$con = new ConectorBD($host,$hostUser,$hostPass);
$response['conexion'] = $con->initConexion($database);

if($response['conexion']=="OK"){
	
	$tablas = ["usuarios"];
	$consulta = $con->consultar($tablas,['email','password'],"WHERE email='".$user."'"); 
	if($consulta->num_rows!=0){
		$fila = $consulta->fetch_assoc();
		if($fila['password']==MD5($pass)){
			$response['login'] = "OK";
			session_start();
			$_SESSION['username'] = $user;
		}else{
			$response['login'] = "Contraseña incorrecta";
		}	
	}else{
		$response['login'] = "Usuario no encontrado";
	}
	
}

echo json_encode($response);
$con->cerrarConexion();

?>
