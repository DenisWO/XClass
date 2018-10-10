<?php
  $servidor = "localhost";
  $usuario = "root";
  $senha = "root";
  $banco = "clientes";
  //Linha para conexão ao Banco
  $conector = new mysqli($servidor,$usuario,$senha,$banco);
  //Verificando a conexão com o banco
  if(mysqli_connect_errno())
    trigger_error(mysqli_connect_errno());

?>
