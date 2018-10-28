<?php

  include_once './Exception.php';

  class Created_atException extends Exception{

    const MENSAGEM_DEFAULT = "Created_at não pode ser alterado duas vezes";

    public function __construct() {
      parent::__construct(Created_atException::MENSAGEM_DEFAULT);
    }

  }

?>
