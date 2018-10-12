<?php
  include '../../model/User.php';
  include '../connection/Connection.php';

  public function createFullNewUser() {
    $user;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];

    if( !(is_string($firstName) && is_string($lastName) && is_string($email) && is_string($password) ) ){
      echo "Campos não válidos";
      return;
    }

    $user = new User($firstName, $lastName, $email, $password, $age);
    $this->saveNewUser($user);
  }

  /*Essa função tem o intuito de cadastrar rapidamente o cliente que deseja utilizar
  o sistema e ainda não possui login*/
  public function createReducedNewUser() {
    $user;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    /*Os métodos de validação de nome, email e senha precisam ser implementados aqui*/
    if( !(is_string($name) && is_string($email) && is_string($password) ) ){
      echo "Campos não válidos";
      return;
    }

    $user = new User($name, $email, $password);
    $this->saveNewUser($user);
  }

  private function saveNewUser($user) {
    try {
      $dao = new UserDAO();
      $dao->save($user);

      echo "Sua conta foi criada com sucesso!";
    }catch(CannotConnectSQLException $e) {
      echo $e->getMessageToUser();
    }catch(WrongObjectException $e) {
      echo 'Exceção capturada: ',  $e->getMessageToUser(), "\n";
    }catch(EmailAlreadyRegistered $e) {
      $e->getMessageToUser(); //Email ja cadastrado
    }
  }
?>
