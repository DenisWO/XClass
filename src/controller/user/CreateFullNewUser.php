<?php

  /*Essa função tem o intuito de cadastrar um cliente completo */

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once 'SaveUser.php';

  $user;
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $birthday = $_POST['birthday'];

  if( !(is_string($firstName) && is_string($lastName) && is_string($email) && is_string($password) ) ){
    echo "Campos não válidos";
    return;
  }

  $user = new User($firstName, $lastName, $email, $password, $birthday);
  $this->saveNewUser($user);

?>
