<?php
  include_once '../model/bean/Class.php';
  include_once '../model/dao/ClassDAO.php';
  include_once './../../errors/CannotConnectSQLException.php';
  include_once './../../errors/SQLException.php';
  include_once './../../errors/WrongObjectException.php';
  include_once './../../errors/EmailAlreadyRegistered.php';

  private function createNewClass($class){
    try{
      $dao = new ClassDAO();
      $dao->save($class);

      echo "Classe criada com sucesso!";
    }catch(Exception $e){
      echo "Excecao capturada " . $e->getMessageToUser(), "\n";
    }
  }


?>
