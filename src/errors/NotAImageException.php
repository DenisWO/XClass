<?php

  include_once 'Exception.php';

  class NullException extends Exception{

    const MENSAGEM_DEFAULT = "Era esperado uma imagem";

    private $tmp;

    public function __construct() {
      parent::__construct(Created_atException::MENSAGEM_DEFAULT);
    }

    public function __construct($tmp) {
      parent::__construct(Created_atException::MENSAGEM_DEFAULT);
      $this->setTmp($tmp);
    }

    public function getTmp() {
      return $this->tmp;
    }

    public function setTmp($tmp) {
      $this->tmp = $tmp;
    }

  }

?>
