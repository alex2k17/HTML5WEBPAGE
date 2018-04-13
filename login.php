<?php
require_once("DATOS/bddConnection.php");
?>
<!--HTML -->
<!DOCTYPE html>
	<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="js/mScript.js"></script>
	</head>
	<body>
		<section>
			<div class="container">
			    <div class="row align-items-center justify-content-center">
			        <div class="col-md-offset-5 col-md-3 col-centered">
			            <div class="form-login">
			            	<h4>Bienvenido.</h4>
			            		<input type="text" id="usuario" class="form-control input-sm chat-input" name="fname" placeholder="Usuario">
			            		</br>
			            		<input type="password" id="password" name="password" class="form-control input-sm chat-input" placeholder="Password" />
			           			</br>
				            	<div class="wrapper">
				            		<span class="group-btn">     
				                		<a id="btnLogin" href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
				            		</span>
				            	</div>
			            </div>
        			</div>
   				</div>
			</div>
		</section>
	</body>
</html>


<!--FIN HTML -->





<?php







?>