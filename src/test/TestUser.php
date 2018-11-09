<?php
  include_once __DIR__ . '/../model/bean/User.php';
  include_once __DIR__ . '/../model/dao/UserDAO.php';

  $bd = getConnection();

  $id = 1;
  $firstName = "Joao";
  $lastName = "dos Testes";
  $email = "joaodostestes@gmail.com";
  $password = "joaojoao";
  $birthday = "1990-01-01";

  $user = new User($id, $firstName, $lastName, $email, $password, $birthday);

  /*echo "Printando os dados de user: <br />";
  echo $user->getId() . "<br />";
  echo $user->getFirstName() . "<br />";
  echo $user->getLastName() . "<br />";
  echo $user->getEmail() . "<br />";
  echo $user->getPassword() . "<br />";
  echo $user->getBirthday() . "<br />";*/

  $dao = new UserDAO($bd);
  //$dao->save($user);
  $dao->update($user);
?>
