<?php

/*Esse script tem o intuito de cadastrar rapidamente o cliente que deseja utilizar
o sistema e ainda não possui login*/
  include '../../model/User.php';
  include 'ValidationUser.php';

  private $user = new User();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

/*Os métodos de validação de nome, email e senha precisam ser implementados aqui*/
  if(is_string($name) && is_string($email) && is_string($password)){
    $user->firstName = $name;
    $user->email = $email;
    $user->password = $password;
  }

  /*Criar função de conectar no banco e incluir o mesmo lá*/
  
?>
