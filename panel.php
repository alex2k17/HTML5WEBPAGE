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