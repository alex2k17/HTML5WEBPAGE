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

}else if ($accion=="getServices") {
	$con = abrirConexion();

	$sql = "SELECT * FROM HOME";

	$result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row) {
    $return[] = [ 
	        'id' => $row['codServ'],
	        'titulo' => $row['TituloServ'],
	        'descripcion' => $row['DescripcionServ']
	    ];
	}

	header('Content-type: application/json');
	echo json_encode($return);

}else if($accion=="updateService"){
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$id = $_POST['id'];

	$con = abrirConexion();

	$sql = "UPDATE HOME SET TituloServ = :titulo, DescripcionServ = :descripcion WHERE codServ = :id";

	$stmt = $con->prepare($sql);

	$stmt->bindValue( "titulo", $titulo, PDO::PARAM_STR);
	$stmt->bindValue( "descripcion", $descripcion, PDO::PARAM_STR);
	$stmt->bindValue( "id", $id, PDO::PARAM_STR);

	$stmt->execute();

	echo "Update";
}else if($accion=="getBlogs"){
	$con = abrirConexion();

	$sql = "SELECT * FROM BLOG ORDER BY fecha LIMIT 3";

	$result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row) {
		$date1 = strtr($row['fecha'], '/', '-');
		$fecha=date('d-m-Y', strtotime($date1));
	    $return[] = [ 
		        'id' => $row['codBlog'],
		        'titulo' => $row['titulo'],
		        'descripcion' => trim_text($row['descripcion'], 15),
		        'imagen' => $row['foto'],
		        'fecha' => $fecha
		    ];
	}

	header('Content-type: application/json');
	echo json_encode($return);

}else if($accion=='insertBlog'){
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$fichero = $_POST['ficheros'];

	$con = abrirConexion();

	$sql = "INSERT INTO BLOG ('titulo', 'descripcion', 'foto') VALUES(:titulo, :descripcion, :foto";

	$stmt = $con->prepare($sql);

	$stmt->bindValue( "titulo", $titulo, PDO::PARAM_STR);
	$stmt->bindValue( "descripcion", $descripcion, PDO::PARAM_STR);
	$stmt->bindValue( "foto", "http://i-pointsite.com/CARUSFERRY/php/files/"+$fichero, PDO::PARAM_STR);

	$stmt->execute();

	echo "INSERTADO";
}

function trim_text($text, $count){ 
	$text = str_replace("  ", " ", $text); 
	$string = explode(" ", $text); 

	for ( $wordCounter = 0; $wordCounter <= $count; $wordCounter++){ 
		$trimed .= $string[$wordCounter]; 
		if ( $wordCounter < $count ){
	 		$trimed .= " "; 
	 	} else { 
	 		$trimed .= "..."; 
	 	} 
	}

	$trimed = trim($trimed); 

	return $trimed; 
} 


function createUI() {
	$contenido = "";
	$contenido .= "<nav class='navbar navbar-inverse navbar-fixed-top'>";
		$contenido .= "<div class='container-fluid'>";
			$contenido .= "<div class='navbar-header'>";
				$contenido .= "<a class='navbar-brand' href='#'><img src='images/logo_blanco.png' width='70' class='d-inline-block align-top' alt=''></a>";
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