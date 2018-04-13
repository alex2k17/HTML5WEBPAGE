<?php 

function abrirConexion(){
	$servername = "localhost";
	$username = "dbo734070765";
	$password = "C4rus,f3rr1,2018";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=db734070765", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully"; 
	} catch(PDOException $e) {
	    //echo "Connection failed: " . $e->getMessage();
	}

	return $conn;
}

?>