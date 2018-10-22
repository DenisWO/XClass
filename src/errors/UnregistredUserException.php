<?php

  include_once './Exception.php';

  class UnregistredUserException extends Exception{

    private $email;

    public function __construct($messageToUser , $messageToDeveloper , $email) {
      parent::__construct($messageToUser, $messageToDeveloper);
      $this->setEmail($email);
    }

    public function __construct($messageToUserAndToDeveloper , $email) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
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
