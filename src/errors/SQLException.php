<?php

  include_once './Exception.php';

  class SQLException extends Exception{

    private $mysqli;
    private $querySql;

    public function __construct($messageToUser , $messageToDeveloper , $mysqli , $querySql) {
      parent::__construct($messageToUser, $messageToDeveloper);
      $this->setMysqli($mysqli);
      $this->setQuerySql($querySql);
    }

    public function __construct($messageToUserAndToDeveloper , $mysqli , $querySql) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
      $this->setMysqli($mysqli);
      $this->setQuerySql($querySql);
    }

    public function getMysqli() {
      return $this->mysqli;
    }

    public function setMysqli($mysqli) {
      $this->mysqli = $mysqli;
    }

    public function getQuerySql() {
      return $this->mysqli;
    }

    public function setQuerySql($querySql) {
      $this->querySql = $querySql;
    }

  }

?>
