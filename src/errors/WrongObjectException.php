<?php

  include_once 'Exception.php';

  class WrongAgeException extends Exception{

    const MENSAGEM_DEFAULT = "Tipo de objeto não esperado";

    private $objectTypeExpected;
    private $objectTypeArrived;

    public function __construct($messageToUser , $messageToDeveloper , $objectTypeExpected , $objectTypeArrived) {
      parent::__construct(WrongAgeException::MENSAGEM_DEFAULT);
      $this->setObjectTypeExpected($objectTypeExpected);
      $this->setObjectTypeArrived($objectTypeArrived);
    }

    public function getObjectTypeExpected() {
      return $this->objectTypeExpected;
    }

    public function setObjectTypeExpected($objectTypeExpected) {
      $this->objectTypeExpected = $objectTypeExpected;
    }

    public function getObjectTypeArrived() {
      return $this->objectTypeArrived;
    }

    public function setObjectTypeArrived($objectTypeArrived) {
      $this->objectTypeArrived = $objectTypeArrived;
    }

  }

?>
