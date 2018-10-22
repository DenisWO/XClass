<?php

  /*Essa função tem o intuito de cadastrar rapidamente o cliente que deseja utilizar
  o sistema e ainda não possui login*/

  include './../../model/bean/User.php';
  include './SaveUser.php';

  $user;
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  /*Os métodos de validação de nome, email e senha precisam ser implementados aqui*/
  if( !(is_string($name) && is_string($email) && is_string($password) ) ){
    echo "Campos não válidos";
    return;
  }

  $user = new User($name, $email, $password);
  $this->saveNewUser($user);

?>
