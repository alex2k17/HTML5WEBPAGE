<?php

require_once ("DATOS/bddConnection.php");

session_start();

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
	$stmt->bindValue( "password", md5($password), PDO::PARAM_STR);
	$stmt->execute();


	if ($stmt->rowCount() == 1){
		session_start();
		session_regenerate_id();
		$_SESSION['user'] = $usuario;
		echo "Login";
	}else{
		echo "Error";
	}


}else if($accion=="cerrarSesion"){
	session_destroy();
	echo "good";
}


function createUI() {
	$contenido = "";
	$contenido .= "<nav class='navbar navbar-inverse navbar-fixed-top'>";
		$contenido .= "<div class='container-fluid'>";
			$contenido .= "<div class='navbar-header'>";
				$contenido .= "<a class='navbar-brand' href='#'><img src='images/logo2.png' width='70' class='d-inline-block align-top' alt=''></a>";
				$contenido .= "<ul class='nav navbar-nav'>";
					$contenido .= "<li class='nav-item active'>
	        							<p class='navbar-text'>Bienvenido!, ".$_SESSION['user']."</p>
	     						   	</li>
	      							<li class='nav-item'>
	        							
	      							</li>
	      							<li class='nav-item'>
	        							
	      							</li>";
	      		$contenido .= "</ul>";
	      		$contenido .= "<p class='navbar-text pull-right'><a id='cerrarSesion' href='#' class='navbar-link'>Cerrar Sesion</a></p>";
      	$contenido .= "</div>";
      	$contenido .= "</div>";
    $contenido .= "</nav>";

    $contenido .= "<div class='sidenav'>
  <a id='modificarPagina' href='#'>Modificar página</a>
  <a id='blog' href='#'>Blog</a>
</div>

<div class='main'>
  <h2>Administración</h2>
  <p>Panel de control.</p>
</div>";

	echo $contenido;
}

?>