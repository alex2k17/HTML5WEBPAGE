<?php

require_once("funciones.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>PANEL ADMINISTRACION</title>
</head>
<body>
	<?php
		if(isset($_SESSION['user'])){
			echo "NICE";

		}else{
			echo "FAIL";
		}
	?>


</body>
</html>

<?php

?>