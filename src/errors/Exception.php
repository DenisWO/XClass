<?php

  class Exception{

    private $date;
    private $messageToUser;
    private $messageToDeveloper;

    public function __construct($messageToUser , $messageToDeveloper) {
      $this->date = date('Y-m-d H:i:s');
      $this->setMessageToUser($messageToUser);
      $this->setMessageToDeveloper($messageToDeveloper);

      $this->printLog();
    }

    public function __construct($messageToUserAndToDeveloper) {
      $this->date = date('Y-m-d H:i:s');
      $this->setMessageToUser($messageToUserAndToDeveloper);
      $this->setMessageToDeveloper($messageToUserAndToDeveloper);

      $this->printLog();
    }

    private function printLog() {
      system.out.println( $this->getMessageToDeveloper . " at Date: " . $this->getDate());
    }

    public function getDate() {
      return $this->date;
    }

    public function getMessageToUser() {
      return $this->messageToUser;
    }

    public function setMessageToUser($messageToUser) {
      $this->messageToUser = $messageToUser;
    }

    public function getMessageToDeveloper() {
      return $this->$messageToDeveloper;
    }

    public function setMessageToDeveloper($messageToDeveloper) {
      $this->$messageToDeveloper = $messageToDeveloper;
    }

  }

?>
