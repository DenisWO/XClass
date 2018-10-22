<?php

  include_once './SQLException.php';

  class CannotConnectSQLException extends SQLException{

    private $mysqli;

    public function __construct($messageToUser , $messageToDeveloper) {
      parent::__construct($messageToUser, $messageToDeveloper);
    }

    public function __construct($messageToUserAndToDeveloper) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
    }

    public function __construct($messageToUser , $messageToDeveloper , $mysqli) {
      parent::__construct($messageToUser, $messageToDeveloper);
      $this->setMysqli($mysqli);
    }

    public function __construct($messageToUserAndToDeveloper , $mysqli) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
      $this->setMysqli($mysqli);
    }

    public function getMysqli() {
      return $this->mysqli;
    }

    public function setMysqli($mysqli) {
      $this->mysqli = $mysqli;
    }

  }

?>
