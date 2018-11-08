<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';
  include_once __DIR__ . '/../model/bean/User.php';
  include_once __DIR__ . '/../../errors/CannotConnectSQLException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';

  private function addActivity($class, $activity){
    try{
      $dao = new XClassDAO();
      $dao->saveActivity($class, $activity);
      $class->addActivity($activity);
      echo "Atividade adicionada à turma com sucesso!";
    }
    catch(Exception $e){
      echo "Excecao capturada " . $e->getMessageToUser(), "\n";
    }
  }

?>
