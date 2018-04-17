<?php

require_once("funciones.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PANEL ADMINISTRACION</title>
	<link rel="stylesheet" href="css/panelstyle.css" type="text/css" media="all"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/mScript.js"></script>
	<script src="js/tinymce.min.js"></script>
 	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<?php
		if(isset($_SESSION['user'])){
			createUI();

		}else{
			?>
			<h3 style='text-align:center;'>This page is <strong>only visible</strong> for <strong>authorized</strong> users <i class="material-icons" style="font-size:48px;color:red"></i></h3>
			<h4 style='text-align:center;'>Return to <a href="http://i-pointsite.com/CARUSFERRY" >Main page</a></h4>
			<?php

		}
	?>


</body>
</html>

<?php

?>