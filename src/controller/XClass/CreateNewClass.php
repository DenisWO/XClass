<?php
  include_once __DIR__ . '/../../model/bean/XClass.php';
  include_once __DIR__ . '/../../model/dao/XClassDAO.php';

  session_start();

  function createNewClass($class){
    $dao = new XClassDAO();
    $dao->save($class);

    if (!$dao) {
      header('location: ../../view/criarTurma/criarTurma.php?erro=2?notSession');
    }
    header('location: ../../view/pagprincipal/pagprincipal.php?erro=2?notSession');
  }
  $dao = new XClassDAO();
  $id = $dao->loadLastId() +1;
  $userdao = new UserDAO();
  $user = $userdao->loadId($_SESSION['id']);
  $class = new XClass($id, $_POST['nomeTurma'], $_POST['instituicao'], $user, $_POST['ano'], $_POST['semestre']);

  createNewClass($class);


?>
