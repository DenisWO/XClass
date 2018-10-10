<?php

  include '../../model/User.php';
  include '../connection/Connection.php';

  public function login() {
    $user = null;
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
      $dao = new UserDAO();
      $user = $dao->loadEmail($email);

      if($user->getPassword === $password){
        echo "Logado com sucesso!";
      }else{
        throw new WrongPasswordException("Senha inválida!" , $email);
      }
    }catch(UnregistredUserException $e) {
      $e->getMessageToUser(); //Email incorreto
    }
  }

?>
