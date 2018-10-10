<?php

  class WrongAgeException extends Exception{

    private $age;

    public function __construct($messageToUser , $messageToDeveloper , $age) {
      parent::__construct($messageToUser, $messageToDeveloper);
      $this->setAge($age);
    }

    public function __construct($messageToUserAndToDeveloper , $age) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
      $this->setAge($age);
    }

    public function getAge() {
      return $this->age;
    }

    public function setAge() {
      $this->age = $age;
    }

  }

?>
