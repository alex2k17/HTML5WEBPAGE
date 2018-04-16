<?php

require_once ("DATOS/bddConnection.php");


if (isset($_POST["accion"]))
	$accion = $_POST["accion"];
else 
	$accion = "";


if($accion=="login"){
	
	$con = abrirConexion();

	$usuario = stripslashes(strip_tags($_POST['usuario']));
	$password = stripslashes(strip_tags($_POST['password']));

	$stmt = $con -> prepare('SELECT * FROM Usuarios WHERE usuario = :usuario AND password = :password LIMIT 1');

	$stmt->bindValue( "usuario", $usuario, PDO::PARAM_STR);
	$stmt->bindValue( "password", $password, PDO::PARAM_STR);
	$stmt->execute();


	if ($stmt->rowCount() == 1){
		session_start();
		session_regenerate_id();
		$_SESSION['user'] = $usuario;
		session_write_close();
		echo "Login";
	}else{
		echo "Error";
	}


}




?>