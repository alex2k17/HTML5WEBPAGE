<?php
require_once("DATOS/bddConnection.php")
?>
<!--HTML -->
<!DOCTYPE html>
	<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="./css/mainLogin">
		<script src="mainLogin.js"></script>
	</head>
	<body>
		<main>
			<section>
			  <h3>Login</h3>
			  <form action="./">
			    <label for="usuario">Usuario</label>
			    	<input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario..">
			    <label for="password">Contraseña</label>
			    	<input type="password" id="password" name="password" placeholder="Introduce tu contraseña..">
			    <input type="button" value="button">
			  </form>
			</section>
		</main>
	</body>
</html>


<!--FIN HTML -->





<?php







?>