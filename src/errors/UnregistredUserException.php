<?php

  //include_once 'Exception.php';

  class UnregistredUserException extends Exception{

    const MENSAGEM_DEFAULT = "Usuário não registrado";

    private $email;

    public function __construct($email) {
      parent::__construct(UnregistredUserException::MENSAGEM_DEFAULT);
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
