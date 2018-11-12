<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';
  include_once __DIR__ . '/../model/bean/Activity.php';

  function addActivity($class, $activity){

    $dao = new XClassDAO();
    $dao->saveActivity($class, $activity);

    if (!$dao) {
      echo "Erro ao tentar salvar atividade!";
    }

    $class->addActivity($activity);
    echo "Atividade adicionada à turma com sucesso!";

  }

?>
