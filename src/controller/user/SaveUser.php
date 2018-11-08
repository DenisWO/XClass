<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';
  include_once __DIR__ . '/../../errors/CannotConnectSQLException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';
  include_once __DIR__ . '/../../errors/EmailAlreadyRegistered.php';

  private function saveNewUser($user) {
    try {
      $dao = new UserDAO();
      $dao->save($user);

      echo "Sua conta foi criada com sucesso!";
    }catch(CannotConnectSQLException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch(SQLException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch(WrongObjectException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch(EmailAlreadyRegistered $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }
  }
?>
