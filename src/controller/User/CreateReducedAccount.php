<?php

/*Esse script tem o intuito de cadastrar rapidamente o cliente que deseja utilizar
o sistema e ainda não possui login*/
  include '../../model/User.php';
  include '../connection/Connection.php';

  $user;
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

/*Os métodos de validação de nome, email e senha precisam ser implementados aqui*/
  if(is_string($name) && is_string($email) && is_string($password)){
    $user = new User($name, $email, $password);
  }

  $sql = "SELECT * FROM User WHERE email = '{$email}'";
  if($conector->query($sql) === NULL){
    $sql = 'INSERT INTO User (first_name, email, password) VALUES (?,?,?)';
    $stmt = $conector->prepare($sql);
    $stmt->bind_param("sss", $user->getFirstName(), $user->getEmail(), $user->getPassword());
    $stmt->execute();
    echo "Usuário inserido com sucesso!";
  }
  else{
    echo "Esse email já está cadastrado por um usuário!";
  }

  echo "Sua conta foi criada com sucesso!";

?>
