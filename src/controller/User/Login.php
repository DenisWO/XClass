<?php
  include '../../model/User.php';
  include '../connection/Connection.php';

  $user = null;
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM User WHERE email = '{$email}'";

  if($dados = $conector->query($sql) === TRUE){
    if($dados["password"] === $password){
      echo "Logado com sucesso!";
      
    }
    else{
      echo "Senha inválida!";
    }
  }
  else{
    echo "Email ou senha inválida!";
  }



?>
