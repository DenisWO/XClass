<?php
  include_once __DIR__ . '/../model/bean/User.php';
  include_once __DIR__ . '/../model/dao/UserDAO.php';

  $bancoDeDados = new Connection();
  $bd = $bancoDeDados->getConnection();

  $id = 1;
  $firstName = "Joao";
  $lastName = "dos Testes";
  $email = "joaodostestes@gmail.com";
  $password = "joaojoao";
  $birthday = "1990-01-01";
  $created_at = "2018-11-07";
  $updated_at = "2018-11-07";

  $user = new User($id, $firstName, $lastName, $email, $password, $birthday, $created_at, $updated_at, null, null);

  /*echo "Printando os dados de user: <br />";
  echo $user->getId() . "<br />";
  echo $user->getFirstName() . "<br />";
  echo $user->getLastName() . "<br />";
  echo $user->getEmail() . "<br />";
  echo $user->getPassword() . "<br />";
  echo $user->getBirthday() . "<br />";
  echo $user->getCreated_At();
  echo $user->getUpdated_At() . "<br />";*/

  $dao = new UserDAO($bd);
?>
