<?php

  include './../../model/bean/User.php';
  include './../../model/dao/UserDAO.php';

  //Esta função retorna TRUE caso o email e senha conferem
  //Exceções que podem ser lançadas:
  //WrongPasswordException , CannotConnectSQLException , SQLException , UnregistredUserException
  public function validateLogin($email, $password) {
    $user = null;
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dao = new UserDAO();
    $user = $dao->loadEmail($email);

    if($user->getPassword() === $password){
      return $user;
    }else{
      throw new WrongPasswordException("Senha inválida!" , $email);
    }
  }
  
?>
