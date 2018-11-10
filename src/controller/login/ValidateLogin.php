<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  function validateLogin($email , $password) {
    $dao = new UserDAO();
    $user = $dao->loadEmail($email);

    if (!$user) {
      return FALSE;
    }

    if ($user->getPassword() === $password) {
      return $user;
    }else{
      return FALSE;
    }
  }
?>
