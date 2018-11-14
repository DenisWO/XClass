<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  $dao = new UserDAO();
  $users = $dao->loadAll();

  $count = count($users);
  for($i = 0; $i < $count; $i++){
    $valor = $users[$i];
    echo '<option value='. $valor->getId() . '>' . $valor->getFullName() . '</option>';
  }

?>
