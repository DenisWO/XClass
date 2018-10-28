<?php

  include_once './../../model/bean/User.php';
  include_once './../validate/ValidateLogin.php';
  include_once './../../errors/CannotConnectSQLException.php';
  include_once './../../errors/SQLException.php';
  include_once './../../errors/WrongPasswordException.php';
  include_once './../../errors/UnregistredUserException.php';

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
