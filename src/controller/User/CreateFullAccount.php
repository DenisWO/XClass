<?php
  include '../../model/User.php';
  include '../connection/Connection.php';

  $user;
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age = $_POST['age'];

  if(is_string($firstName) && is_string($lastName) && is_string($email) && is_string($password)){
    $user = new User($firstName, $lastName, $email, $password, $age);
  }
  $sql = "SELECT * FROM User WHERE email = '{$email}'";
  if($conector->query($sql) === NULL){
    $sql = "INSERT INTO User (first_name, last_name, email, password, age) VALUES (?,?,?,?,?)";
    $stmt = $conector->prepare($sql);
    $stmt->bind_param("ssssd", $user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getPassword(), $user->getAge());
    $stmt->execute();
    echo "Usuário cadastrado com sucesso!";
  }
  else{
    echo "Esse email já está cadastro por um usuário!";
  }

?>
