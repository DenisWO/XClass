<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  $id = $_POST['id'];

  $dao = new UserDAO();
  $user = $dao->loadId($id);

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $birthday = $_POST['birthday'];

  $user->setFirstName($firstName);
  $user->setLastName($lastName);
  $user->setEmail($email);
  $user->setPassword($password);
  $user->setBirthday($birthday);

  $result = $dao->update($user);

  if ($result) {
    echo '<body><script type="text/javascript">$.notify("Atualizado com sucesso!", "success");</script></body>';
  }else{
    echo '<body><script type="text/javascript">$.notify("Ocorreu um erro ao atualizar!", "error");</script></body>';
  }

?>
