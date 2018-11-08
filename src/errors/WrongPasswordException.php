<?php

  include_once 'Exception.php';

  class WrongPasswordException extends Exception{

    const MENSAGEM_DEFAULT = "Password incorreto";

    private $email;

    public function __construct($messageToUser , $messageToDeveloper , $email) {
      parent::__construct(WrongPasswordException::MENSAGEM_DEFAULT);
      $this->setEmail($email);
    }

    public function getEmail() {
      return $this->email;
    }

    public function setObjectUser($email) {
      $this->oemail = $email;
    }

  }

?>
