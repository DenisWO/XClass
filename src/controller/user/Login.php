<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  function login(){
    try {
      session_start();

      $user = validateLogin($_POST['email'] , $_POST['password']);

      if ($user) {
        echo "Login realizado com sucesso!";
      }else{
        echo "Login não realizado!";
      }

  }

  function validateLogin($email , $password) {
    $dao = new UserDAO();
    $user = $dao->loadEmail($email);

    if (!$user) {
      return FALSE;
    }

    if ($user->getPassword() === $password) {
      return TRUE;
    }else{
      return FALSE;
    }
  }
?>
