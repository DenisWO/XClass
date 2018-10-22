<?php

  include_once './../../model/bean/User.php';
  include_once './../../model/dao/UserDAO.php';

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
