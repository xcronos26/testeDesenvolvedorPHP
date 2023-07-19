<?php
 $host = "localhost";
	$user = "root";
	$pass = "";
	$base = "desenvolvedor";

	$conn = new mysqli($host, $user, $pass, $base);
	
	//opcional: mostrar o erro caso não consiga conectar
	if ($conn->connect_error) {
		die('Error: ' . $conn->connect_error);
	}
	
?>