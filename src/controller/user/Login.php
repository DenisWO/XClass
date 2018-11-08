<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../validate/ValidateLogin.php';
  include_once __DIR__ . '/../../errors/CannotConnectSQLException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/WrongPasswordException.php';
  include_once __DIR__ . '/../../errors/UnregistredUserException.php';

  public function login(){
    try {
      session_start();

      $user = validateLogin($_POST['email'] , $_POST['password']);

      $_SESSION = $user->getId();
      echo "Login realizado com sucesso!";
    }catch (CannotConnectSQLException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch (SQLException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch (WrongPasswordException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch (UnregistredUserException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }
  }

?>
