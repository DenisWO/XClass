<?php

  include_once 'Exception.php';

  class EmailAlreadyRegistered extends Exception{

    const MENSAGEM_DEFAULT = "Email já cadastrado";

    private $email;

    public function __construct($email) {
      parent::__construct(EmailAlreadyRegistered::MENSAGEM_DEFAULT);
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
