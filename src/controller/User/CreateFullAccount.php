<?php
  include '../../model/User.php';
  include '../connection/Connection.php';

  private $user = new User();
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age = $_POST['age'];

  if(is_string($firstName) && is_string($lastName) && is_string($email) && is_string($password)){
    
  }


?>
