<?php

require_once ("DATOS/bddConnection.php");


if (isset($_POST["accion"]))
	$accion = $_POST["accion"];
else 
	$accion = "";


if($accion=="login"){
	$success = false;
	$con = abrirConexion();

	$usuario = stripslashes(strip_tags($_POST['usuario']));
	$pass = stripslashes(strip_tags($_POST['password']));

	$stmt = $con -> prepare('SELECT * FROM Usuarios WHERE usuario = :usuario AND password = :password LIMIT 1');

	$stmt->bindValue( "usuario", $this->usuario, PDO::PARAM_STR);
	$stmt->bindValue( "password", md5($this->password), PDO::PARAM_STR);
	$stmt->execute();

	$valid = $stmt->fetchColumn();

	if ($valid){
		$success = true;
		session_start();
		session_regenerate_id();
		$_SESSION['user'] = $usuario;
		session_write_close();
		return $success;
	}else{
		return $success;
	}


}




?>