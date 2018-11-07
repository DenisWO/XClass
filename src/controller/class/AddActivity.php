<?php
  include_once '../model/bean/Class.php';
  include_once '../model/dao/ClassDAO.php';
  include_once '../model/bean/User.php';
  include_once './../../errors/CannotConnectSQLException.php';
  include_once './../../errors/SQLException.php';
  include_once './../../errors/WrongObjectException.php';

  private function addActivity($class, $activity){
    try{
      $dao = new ClassDAO();
      $dao->saveActivity($class, $activity);
      $class->addActivity($activity);
      echo "Atividade adicionada à turma com sucesso!";
    }
    catch(Exception $e){
      echo "Excecao capturada " . $e->getMessageToUser(), "\n";
    }
  }

?>
