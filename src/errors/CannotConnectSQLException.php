<?php

  include_once 'SQLException.php';

  class CannotConnectSQLException extends SQLException{

    const MENSAGEM_DEFAULT = "Não foi possivel conectar ao banco de dados";

    private $mysqli;

    public function __construct($mysqli) {
      parent::__construct(CannotConnectSQLException::MENSAGEM_DEFAULT);
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
