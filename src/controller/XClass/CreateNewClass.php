<?php
  include_once __DIR__ . '/../../model/bean/XClass.php';
  include_once __DIR__ . '/../../model/dao/XClassDAO.php';

  session_start();

  function createNewClass($class){
    $dao = new XClassDAO();
    $dao->save($class);

    if (!$dao) {
      echo "Erro ao tentar salvar classe!";
    }

    echo "Classe criada com sucesso!";
  }
  $dao = new XClassDAO();
  $id = $dao->loadLastId() +1;
  $userdao = new UserDAO();
  echo $_SESSION['id'];
  $user = $userdao->loadId($_SESSION['id']);
  //$class = new XClass($id, $_POST['nomeTurma'], $_POST['instituicao'], $_POST['year'], $_POST['semestre'], )


?>
