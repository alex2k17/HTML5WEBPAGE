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

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/mScript.js"></script>
</head>
<body>
	<?php
		if(isset($_SESSION['user'])){
			createUI();

		}else{
			?>
			<h3 style='text-align:center;'>This page is <strong>only visible</strong> for <strong>authorized</strong> users</h3>
			<?php

		}
	?>


</body>
</html>

<?php

?>