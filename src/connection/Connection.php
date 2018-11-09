<?php

	function getConnection() {
	  $host = 'localhost';
	  $user = 'root';
	  $pass = '';
	  $db   = 'XClass';

	  // conecta com o banco de dados
	  $conn = mysqli_connect($host, $user, $pass, $db);

	  return $conn;
	}

?>
