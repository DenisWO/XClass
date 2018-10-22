<?php

  include_once './Exception.php';

  class SQLException extends Exception{

    const MENSAGEM_DEFAULT = "Ocorreu um erro ao tentar realizar comandos SQL";

    private $mysqli;
    private $querySql;

    public function __construct() {
      parent::__construct(SQLException::MENSAGEM_DEFAULT);
    }

    public function __construct($mysqli , $querySql) {
      parent::__construct(SQLException::MENSAGEM_DEFAULT);
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
