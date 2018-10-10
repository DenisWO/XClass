<?php
  include '../model/bean/User.php';
  include '../model/dao/UserDAO.php';

  public function createAccount(){
    try {
      $user = new User(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['password'],
        $_POST['age']
      );

      $dao = new UserDAO();
      $retorno = $dao->save($user);
      echo $retorno;

    }catch(WrongAgeException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch(Created_atException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch(WrongObjectException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }
  }
  public function login(){
    try {
      session_start();

      $dao = new UserDAO();
      $user = $dao->validateLogin($_POST['email'] , $_POST['password']);

      $_SESSION = $user->getId();
      echo "Login realizado com sucesso!";
    }catch(WrongPasswordException $e) {
      echo $e->getMessageToUser(); //Email ou senha incorreto
    }
  }
?>
