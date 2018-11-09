<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  function saveNewUser($user) {
    $dao = new UserDAO();
    $dao->save($user);

    if ($dao) {
      echo "Sua conta foi criada com sucesso!";
    }else{
      echo "Erro ao salvar!"
    }


  }
?>
