<?php

	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$banco = "XClass";

  //Conector BDA line
	$conector = new mysqli($servidor,$usuario,$senha,$banco);

  //Verifying connection to the bank
	if(mysqli_connect_errno()) trigger_error(mysqli_connect_errno());

?>
