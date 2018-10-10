<?php

  class Exception{

    private $date;
    private $file;
    private $line;
    private $messageToUser;
    private $messageToDeveloper;

    public function __construct($messageToUser , $messageToDeveloper) {
      $this->date = date('Y-m-d H:i:s');
      $this->file = __FILE__;
      $this->line = __LINE__;
      $this->setMessageToUser($messageToUser);
      $this->setMessageToDeveloper($messageToDeveloper);

      $this->printLog();
    }

    public function __construct($messageToUserAndToDeveloper) {
      $this->__construct($messageToUserAndToDeveloper , $messageToUserAndToDeveloper);
    }

    private function printLog() {
      //Colocar algo para printar log
    }

    public function getDate() {
      return $this->date;
    }

    public function getFile() {
      return $this->file;
    }

    public function getLine() {
      return $this->Line;
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
