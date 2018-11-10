<?php
  include_once __DIR__ . '/../model/bean/User.php';
  include_once __DIR__ . '/../model/dao/UserDAO.php';

  $user1 = new User(1, 'Vitor', 'Amaral', 'vitor@hotmail.com', '123456', '20180704');
  $user2 = new User(2, 'Lucas', 'Silva', 'lucas@hotmail.com', '123456','20180512');

  /*echo "Printando os dados de user: <br />";
  echo $user->getId() . "<br />";
  echo $user->getFirstName() . "<br />";
  echo $user->getLastName() . "<br />";
  echo $user->getEmail() . "<br />";
  echo $user->getPassword() . "<br />";
  echo $user->getBirthday() . "<br />";*/

  $userdao = new UserDAO();
  //$dao->save($user);
  /*$dao->save($user1);
  $dao->save($user2);*/
  $userdao->update($user1);
  $userdao->update($user2);
?>
