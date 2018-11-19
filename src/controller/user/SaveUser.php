<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';
  session_start();

  function saveNewUser($user) {
    $dao = new UserDAO();
    $dao->save($user);

    if ($dao) {
      header('Location: ../../view/pagprincipal/index.php');
      $_SESSION['id'] = $user->getI();
      $_SESSION['name'] = $user->getFullName();
    }else{
      echo "Erro ao salvar!";
    }
  }
?>
