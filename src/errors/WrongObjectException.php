<?php

  class WrongAgeException extends Exception{

    private $objectTypeExpected;
    private $objectTypeArrived;

    public function __construct($messageToUser , $messageToDeveloper , $objectTypeExpected , $objectTypeArrived) {
      parent::__construct($messageToUser, $messageToDeveloper);
      $this->setObjectTypeExpected($objectTypeExpected);
      $this->setObjectTypeArrived($objectTypeArrived);
    }

    public function __construct($messageToUserAndToDeveloper , $objectTypeExpected , $objectTypeArrived) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
      $this->setObjectTypeExpected($objectTypeExpected);
      $this->setObjectTypeArrived($objectTypeArrived);
    }

    public function getObjectTypeExpected() {
      return $this->objectTypeExpected;
    }

    public function setObjectTypeExpected($objectTypeExpected) {
      $this->objectTypeExpected = $objectTypeExpected;
    }

    public function getObjectTypeArrived() {
      return $this->objectTypeArrived;
    }

    public function setObjectTypeArrived($objectTypeArrived) {
      $this->objectTypeArrived = $objectTypeArrived;
    }

  }

?>
