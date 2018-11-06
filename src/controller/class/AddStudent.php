<?php
  include_once '../model/bean/Class.php';
  include_once '../model/dao/ClassDAO.php';
  include_once '../model/bean/User.php';
  include_once './../../errors/CannotConnectSQLException.php';
  include_once './../../errors/SQLException.php';
  include_once './../../errors/WrongObjectException.php';
  include_once './../../errors/EmailAlreadyRegistered.php';

  private function addStudent($class, $student){
    try{
      $dao = new ClassDAO();
      $dao->saveStudent($class, $student);
      $class[] = $student;
      echo "Aluno adicionado à turma com sucesso!";
    }
    catch(Exception $e){
      echo "Excecao capturada " . $e->getMessageToUser(), "\n";
    }
  }

?>
