<?php

  include_once 'SQLException.php';

  class NotFoundSQLException extends SQLException{

    const MENSAGEM_DEFAULT = "O registro não foi encontrado no banco";

    private $mysqli;

    public function __construct() {
      parent::__construct(NotFoundSQLException::MENSAGEM_DEFAULT);
      $this->setMysqli($mysqli);
    }

    public function __construct($mysqli) {
      parent::__construct(NotFoundSQLException::MENSAGEM_DEFAULT);
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
