<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';
  include_once __DIR__ . '/../model/bean/User.php';
  include_once __DIR__ . '/../../errors/CannotConnectSQLException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';
  include_once __DIR__ . '/../../errors/EmailAlreadyRegistered.php';

  private function addStudent($class, $student){
    try{
      $dao = new XClassDAO();
      $dao->saveStudent($class, $student);
      $class->addStudent($student);
      echo "Aluno adicionado à turma com sucesso!";
    }
    catch(Exception $e){
      echo "Excecao capturada " . $e->getMessageToUser(), "\n";
    }
  }

?>
