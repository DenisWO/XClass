<?php

  //include_once 'Exception.php';

  class NullException extends Exception{

    const MENSAGEM_DEFAULT = "O objeto é nulo ou possui algum atributo not-null nulo";

    private $object;

    public function __construct() {
      parent::__construct(Created_atException::MENSAGEM_DEFAULT);
    }

    /*public function __construct($object) {
      parent::__construct(Created_atException::MENSAGEM_DEFAULT);
      $this->setObject($object);
    }*/

    public function getObject() {
      return $this->object;
    }

    public function setObject($object) {
      $this->object = $object;
    }

  }

?>
