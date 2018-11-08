<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';
  include_once __DIR__ . '/../../errors/CannotConnectSQLException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';
  include_once __DIR__ . '/../../errors/EmailAlreadyRegistered.php';

  function createNewClass($class){
    try{
      $dao = new XClassDAO();
      $dao->save($class);

      echo "Classe criada com sucesso!";
    }catch(Exception $e){
      echo "Excecao capturada " . $e->getMessageToUser(), "\n";
    }
  }


?>
