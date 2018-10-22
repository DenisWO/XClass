<?php

  class Exception{

    private $date;
    private $message;

    public function __construct($message) {
      $this->date = date('Y-m-d H:i:s');
      $this->setMessage($message);

      $this->printLog();
    }

    private function printLog() {
      system.out.println( $this->getMessage() . " at Date: " . $this->getDate());
    }

    public function getDate() {
      return $this->date;
    }

    public function getMessage() {
      return $this->message;
    }

    public function setMessage($message) {
      $this->$message = $message;
    }

  }

?>
