<?php
require_once("DATOS/bddConnection.php")
?>
<!--HTML -->
<!DOCTYPE html>
	<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="./css/mainLogin">
		<script src="js/mScript.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<main>
			<section>
			  <h3>Login</h3>
			  <form id="loginform" method="post">
			    <label for="usuario">Usuario</label>
			    	<input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario..">
			    <label for="password">Contraseña</label>
			    	<input type="password" id="password" name="password" placeholder="Introduce tu contraseña..">
			    <input type="submit" value="Login" name="loginsub">
			  </form>
			</section>
		</main>
	</body>
</html>


<!--FIN HTML -->





<?php







?>